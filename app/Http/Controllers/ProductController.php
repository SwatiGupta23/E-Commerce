<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Orders;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    function index()
    {
        // return Product::all();
        $data = Product::all();
        return view('product',['products'=>$data]);
    }


    function detail($id){
        $data  = Product::find($id);
        return view('detail',['details'=>$data]);
    }

    function search(Request $req){
    //    return $req->input();
     $data = Product::where('name','like','%'.$req->input('query').'%')->get();
     return view('search',['products'=>$data]);
    }

    function addToCart(Request $req){
        // return "addtocart";
        if($req->session()->has('user')){
            $cart = new Cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            // return redirect('/');
            return redirect('/')->with('success', 'Product added to cart successfully!');

        }else{
        return redirect('/login')->with('error', 'Please login first.');
        }
    }

    public function cartItem()
{
    if (session()->has('user')) {

        $userId = session()->get('user')['id'];

        $cartItems = Cart::where('user_id', $userId)->count();

        return $cartItems;
        
    }

    return 0;
}



public function cartList(){
    $userId = Session::get('user')['id'];
   $data = DB::table('cart')
    ->join('product','cart.product_id','product.id')
    ->select('product.*','cart.id as cart_id')
    ->where('cart.user_id',$userId)
    ->get();
    return view('cartlist',['products'=> $data]);
}

public function deletecart($id){
 Cart::destroy($id);
 return redirect("/cartlist");
}

public function ordernow(){
    $userId = Session::get('user')['id'];
   $total = DB::table('cart')
    ->join('product','cart.product_id','product.id')
    ->where('cart.user_id',$userId)
    ->sum('product.price');
    return view('ordernow',['total'=> $total]);
}

public function orderplace(Request $req){
    $userId = Session::get('user')['id'];
    $allCart = Cart::where('user_id',$userId)->get();
    foreach($allCart as $cart){
        $order = new Orders;
        $order->product_id=$cart['product_id'];
        $order->user_id=$cart['user_id'];
        $order->address=$req->address;
        $order->status="pending";
        $order->payment_method=$req->payment;
        $order->payment_status="pending";
        $order->full_name=$req->name;
        $order->email=$req->email;
        $order->mobile_number=$req->phone;
        $order->pin_code=$req->pincode;
        $order->state=$req->state;
        $order->city=$req->city;
        $order->save();
    }

    Cart::where('user_id',$userId)->delete();
    return redirect('/');
    // return $req->input();
}

public function myOrder(){
  $userId = Session::get('user')['id'];
   $myorder = DB::table('orders')
    ->join('product','orders.product_id','product.id')
    ->where('orders.user_id',$userId)
    ->get();
    return view('myorder',['myorder' => $myorder]);
  }
} 