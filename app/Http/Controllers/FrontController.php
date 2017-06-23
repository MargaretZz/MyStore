<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Category;
use App\Cart;
use App\Order;

class FrontController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.index', ['products' => Product::All(), 'categories' => Category::All()]);
    }

    public function getProductByCategory(Request $request)
    {
        $products = Product::where('category', $request->category)->get();

        return view('front.index', ['products' => $products, 'categories' => Category::All()]);

    }

    public function addCart(Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->id;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        $product = Product::find($request->id);
        $products = Product::where('category', $product->category)->get();
        return view('front.index', ['products' => $products, 'categories' => Category::All()]);
    }

    public function getCart(Request $request)
    {
        $carts = Cart::where('product_id',Auth::user()->id)->get();

        $total = 0;
        foreach($carts as $cart)
        {
            $total += $cart->product->price;

        }
        return view('front.cart', ['carts' => $carts, 'total' => $total]);
    }

    public function deleteCart(Request $request)
    {
        Cart::destroy($request->id);

         $carts = Cart::where('product_id',Auth::user()->id)->get();

        $total = 0;
        foreach($carts as $cart)
        {
            $total += $cart->product->price;

        }
        return view('front.cart', ['carts' => $carts, 'total' => $total]);
    }

    public function order(Request $request)
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();

        $total = 0;
        foreach($carts as $cart)
        {
            $total += $cart->product->price;

        }
        return view('front.order', ['total' => $total, 'carts' => $carts]);
    }

    public function listOrder()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('front.listOrder', ['orders' => $orders]);
    }

    public function orderPost(Request $request)
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = 0;
        
        $total = 0;
        foreach($carts as $cart)
        {
            $total += $cart->product->price;

        }
        $order->price = $total;
        $order->phone = $request->phone;
        $order->address = $request->address;
        
        $order->save();
        return;
    }
}
