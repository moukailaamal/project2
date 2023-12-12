<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class articleController extends Controller
{
    // pour affiche 
    public function  index(){
        $article = Article::with('categorie')->get();
        return view('articles.index',['articles'=>$article]);
    }
    public function show(string $id)
    {
        //
    }
    // Pour cree
    public function create(){
        $categories=Categorie::all();
        return view('articles.create',['categories'=>$categories]);
    }
    // pour requpere les information
    public function store(Request $request){
      $article=new Article()  ;
      $article->nom=$request->input('nom');
      $article->prix=$request->input('prix');
      $article->description=$request->input('description');
      $article->categorie_id=$request->input('categorie_id');
      $path = $request->file('image')->store('public/articles');
     $article->image_path = Storage::url($path);
      $article->save();
      return redirect()->route('articles.index');
    }
    // pour envoyer les information 
    public function edit($id){
       $categories=Categorie::all();
       $article=Article::with('categorie')->find($id);
       return view('articles.update',['article'=>$article,'categories'=>$categories]);
    }
    // pour faire la modification
    public function update (Request $request,$id){
        $article=Article::with('categorie')->find($id);
        $article->nom=$request->input('nom');
        $article->prix=$request->input('prix');
        $article->description=$request->input('description');
        $article->categorie_id=$request->input('categorie_id');

        if ($request->hasFile('image')) {
            // Supprimez l'ancienne image si elle existe
                Storage::delete($article->image_path);
            
            $path = $request->file('image')->store('public/articles');
            $article->image_path = Storage::url($path);
        }


        $article->update(); 
        return redirect()->route('articles.index');
    }
    // pour effacer
    public function destroy($id){
        $ligne=Article::with('categorie')->find($id);
        if($ligne){
            $ligne->delete();
             return redirect()->route('articles.index');
        }
    }
    
}
