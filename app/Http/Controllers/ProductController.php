<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    //

    public function ajouterproduit(){
        $categories = Category::All()->pluck('category_name','category_name');
        return view('admin.ajouterproduit')->with('categories',$categories);
    }

    public function sauverproduit(Request $request){
       
        $this->validate($request, ['product_name' => 'required|unique:products',
                                    'product_price' => 'required',
                                    'product_category' => 'required',
                                    'product_image' => 'image|nullable|max:1999']);
      

    
        if ($request->hasFile('product_image')) {
            # 1 get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2 get just file name 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
                // 4 file name to store
            $fileNameTotore = $fileName.'_'.time().'.'.$extension;

            // uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameTotore);
        }

        else {
            $fileNameTotore = 'noimage.jpg';
        }

        
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_price =   $request->input('product_price'); 
        $product->product_category =  $request->input('product_category'); 
        $product->product_image = $fileNameTotore;
        $product->status = 1;

        $product->save();

        return redirect('/ajouterproduit ')->with('status', 'Le produit  a été inséré avec succès !');


    }

    public function produit(){

        $produits = Product::get();
        return view('admin.produit')->with('produits', $produits);
    }


    public function edit_produit($id){
        $produits = Product::find($id);
        $categories = Category::All()->pluck('category_name', 'category_name');


        return view('admin.edit_produit')->with('produits', $produits)->with('categories', $categories);
    }

    public function modifierproduit(Request $request){

        
        $this->validate($request, ['product_name' => 'required|unique:products',
                                    'product_price' => 'required',
                                    'product_category' => 'required',
                                    'product_image' => 'image|nullable|max:1999']);
        
        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
      
        $product->status = 1;                            

                                                                                                                                                
        if ($request->hasFile('product_image')) {
            # 1 get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2 get just file name 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 get just file extension
            $extension = $request->file('product_image')->getClientOriginalExtension();
                // 4 file name to store
            $fileNameTotore = $fileName.'_'.time().'.'.$extension;

            // uploader l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameTotore);
            $product->product_image = $fileNameTotore;
        }
             $product->update();

             
        return redirect('/produit')->with('status', 'Le produit ' .$product->product_name. 'a été modifier avec succès !');


    }

    public function supprimerproduit($id){

        $product = Product::find($id);

        $product->delete();

        return redirect('/produit')->with('status', 'Le produit ' .$product->product_name. 'a été supprimer avec succès !');

    }

    public function activer_produit($id){

            $produit = Product::find($id);

            $produit->status = 1;

            $produit->update();

            return redirect('/produit')->with('status', 'Le produit ' .$produit->produit_name. 'a été activer avec succès !');

    }


    public function desactiver_produit($id){

        $produit = Product::find($id);

        $produit->status = 0 ;

        $produit->update();

        return redirect('/produit')->with('status', 'Le produit ' .$produit->produit_name. 'a été Desactiver avec succès !');

}
}
