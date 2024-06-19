<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionsController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8|alpha_dash|confirmed',
        ], [
            'user.name.required' => 'Поле "Имя" обязательно для заполнения',
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
            'user.password.confirmed'=> 'Поле "Пароль" и "Повторите пароль" не совпадает',
        ]);

        $user = User::create($request -> input('user'));
        Auth::login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user.email'=> 'required|email',
            'user.password'=> 'required|min:8|alpha_dash',
        ], [
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
        ]);
        if(Auth::attempt($request -> input('user'))) {
            return redirect('/');
        } else {
            return back() -> withErrors([
                'user.email' => 'Предоставленная почта или пароль не подходят'
            ]);
        }
    }

    public function quest_create(Request $request){
        $request->validate([
            'quest.title' => 'required',
            'quest.description' => 'required',
        ], [
            'quest.title.required' => 'Поле "Название" обязательно для заполнения',
            'quest.description.required' => 'Поле "Описание" обязательно для заполнения',
        ]);

        $quest = new Quest;
        $quest -> user_id = Auth::user()->id;
        $quest -> title = $request -> input('quest.title');
        $quest -> description = $request -> input('quest.description');
        $quest -> save();

        return redirect('/');
    }

    public function quest_check(int $quest_id)
    {
        $quest = Quest::find($quest_id);
        $tasks = Task::where('quest_id', $quest_id)->get();
        return view('pages.quest.quest_chow', ['quest' => $quest, 'tasks' => $tasks]);
    }

    public function tasks_create_web(int $quest_id){
        return view('pages.tasks.task_create', ['quest' => $quest_id]);

    }

    public function tasks_create(int $quest_id, Request $request){
        $request->validate([
            'task.title' => 'required',
            'task.description' => 'required',
            'task.hint_text' => 'required',
        ]);

        $tasks = new Task();
        $tasks -> quest_id = $quest_id;
        $tasks -> title = $request -> input('task.title');
        $tasks -> description = $request -> input('task.description');
        $tasks -> hint_text = $request -> input('task.hint_text');
        $tasks -> save();

        return redirect('/');
    }
}
