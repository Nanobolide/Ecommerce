<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;
use App\Cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;



class ClientController extends Controller
{
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $produits = Product::where('status', 1)->get();

        return view('client.home')->with('sliders', $sliders)->with('produits', $produits);
    }

    public function shop(){
        $categories = Category::get();
        $produits = Product::where('status', 1)->get();
        return view('client.shop')->with('categories', $categories)->with('produits', $produits);
    }

    public function select_par_cat($name){ //sectionner le panier

        $categories = Category::get();
        $produits = Product::where('product_category', $name)->where('status', 1)->get();

        return view('client.shop')->with('produits',$produits)->with('categories',$categories);
    }


    public function ajouter_au_panier($id){
        
         $produit = Product::find($id);

   
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('cart', $cart);

  

        //dd(Session::get('cart'));

         return redirect('/shop');
}

    

    public function panier(){

         if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);

    }

    public function modifier_qty(Request $request, $id){ //modifier le panier

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/panier');

    }

    public function retirer_produit($id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/panier');

    }

    public function payer(Request $request){

        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51MzTN5AEZAkDpLt7rF0jWhiVRrfbu46BRKOS7A6EXcRUMXrVkxYNTFRFBS4acKCTXTqbZnEs9ch44OdHoBbEtS7t00NxeLfAKK');

         try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

          

        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/paiment')->with('error', $e->getMessage());
        }

        

         Session::forget('cart');
        // Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/panier')->with('status','Achat accompli avec succès');


    }




    public function client_login(){
        return view('client.login');
    }

    public function signup(){ 
        return view('client.signup');
    }

    public function paiement(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        return view('client.checkout');
    }
}
