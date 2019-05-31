<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	public $table='quizes';
	
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
