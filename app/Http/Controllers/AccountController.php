<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Auth;

class AccountController extends Controller
{
    public function generateFunction($name)
    {
    	$quizes = '';
    	if($name == 'edit')
    		$quizes = Quiz::where('id_user','=',Auth::user()->id)->get();
    	return view('pages.account',['name' => $name, 'quizes' => $quizes]);
    }
}
