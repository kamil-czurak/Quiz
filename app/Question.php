<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['name', 'id_quiz'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
