<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    // pour affiche 
    public function index(){
        $categorie=Categorie::get();
        return view('categories.index',['categories'=>$categorie]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $categorie=new Categorie();
        $categorie->nom=$request->input('nom');
        $categorie->save();
        return redirect()->route('categories.index');
    }

    public function edit($id){
        $categorie=Categorie::find($id);
        return view('categories.update',['categorie'=>$categorie]);
    }

    public function update(Request $request,$id){
        $categorie = Categorie::find($id);
        $categorie->nom=$request->input('nom');
        $categorie->update();
        return redirect()->route('categories.index');
    }
    public function destroy($id){
        $categorie=Categorie::find($id);
        if($categorie){
            $articles=Article::where('categorie_id', $id)->delete();
            $categorie->delete();
            return redirect()->route('categories.index');
        }
    }
  
}