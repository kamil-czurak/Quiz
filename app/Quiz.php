<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	public $table='quizes';
	
    protected $fillable = ['name','id_user'];

    protected $attributes = [
		'times_played' => '0'
	];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
