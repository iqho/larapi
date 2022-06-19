<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    function index(){
        $posts =  Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        //return $posts;
        return view('welcome', ['posts'=>$posts]);
    }
}
