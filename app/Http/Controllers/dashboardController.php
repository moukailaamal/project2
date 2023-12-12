<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function  index(){
        $articles=Article::all();
        $categories=Categorie::all();
        return view('dashboard',['categories'=>$categories,'articles'=>$articles]);
    }
   
}
