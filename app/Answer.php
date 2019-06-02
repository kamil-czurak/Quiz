<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['name', 'id_question', 'correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
