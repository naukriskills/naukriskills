<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
       $category = Category::limit(5)->get();
       return view('index',compact('category'));
    } 

}