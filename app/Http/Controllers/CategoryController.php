<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //

    public function ajoutercategorie(){
        return view('admin.ajoutercategorie');
    }

    public function sauvercategorie(Request $request){
        $this->validate($request, ['category_name'=>'required|unique:categories']);
        $categorie = new Category();

        $categorie->category_name = $request->input('category_name');
        $categorie->save();

        return redirect('/ajoutercategorie')->with('status', 'La catégorie '.$categorie->cateegory_name.' a été ajoutée avec succès');

    }

    public function categorie(){
        $categories = Category::get();
        return view('admin.categorie')->with('categories',$categories);
    }
    

    public function edit_categorie($id){
        $categorie = Category::find($id);

        return view('admin.editcategorie')->with('categorie', $categorie);

    }

    public function modifiercategorie(Request $request){
        
        $this->validate($request, ['category_name'=>'required|unique:categories']);

        $categorie = Category::find($request->input('id'));

        $categorie->category_name = $request->input('category_name');
        $categorie->update();

        return redirect('/categorie')->with('status', 'La catégorie '.$categorie->category_name.' a été modifiée avec succès');


    }


    public function supprimercategorie($id){
        $categorie = Category::find($id);

        $categorie->delete();

        
        return redirect('/categorie')->with('status', 'La catégorie '.$categorie->category_name.' a été supprimée avec succès');

    }

}
