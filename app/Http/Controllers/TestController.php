<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function contact($name){
    	echo "Je suis dans la méthode contact et je m'appele $name";
    }
}
