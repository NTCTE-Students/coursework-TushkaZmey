<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'quest_id', 'title', 'description',
    ];

    // Связь с квестом
    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }
}
