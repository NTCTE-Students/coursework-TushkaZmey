<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        return view("index", ['quests' => Quest::all()]);
    }

    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }

    public function quest_create()
    {
        return view("pages.quest.create_quest");
    }


}
