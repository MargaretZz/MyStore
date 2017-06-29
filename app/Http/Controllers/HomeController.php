<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Order;
use App\OrderItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listCategory', ['categories' => Category::All()]);
    }

    public function addCategory()
    {
      return view('admin.addCategory');
    }

    public function editProduct(Request $request)
    {
        $product = Product::find($request->id);
        return view('admin.editProduct', ['product' => $product, 'categories' => Category::All()]);
    } 
    public function postCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/home');
    }
    public function editPostProduct(Request $request)
    {
        if ($request->file != null)
            $path = $request->file('file')->store('public');

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        if ($request->file != null)
            $product->picture = asset($path);
        $product->save();

        $products = Product::where('category', $request->category);
        return redirect()->action('HomeController@listProduct'); 
    }

    public function deleteCategory(Request $request)
    {
        Category::destroy($request->id);
        return redirect('/home');
    }

    public function listProduct(Request $request)
    {
        if ($request->category) {
            $products = Production::where('category', $request->category);
        } else {
            $products = Product::All();
        }
        return view('admin.listProduct', ['products' => $products]);
    }

    public function addProduct()
    {
        return view('admin.addProduct', ['categories' => Category::All()]);
    }

    public function postProduct(Request $request)
    {
        $path = $request->file('file')->store('public');

        $product = new Product();
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->picture = asset($path);
        $product->save();

        $products = Product::where('category', $request->category);
        return redirect()->action('HomeController@listProduct');
    }

    public function deleteProduct(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->action('HomeController@listProduct');
    }


    public function orderList()
    {
        return view('admin.listOrder', ['orders' => Order::All()]);
    }

    public function orderDetail(Request $request)
    {
        $order = Order::find($request->id);
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        return view('admin.orderDetail', ['order' => $order, 'orderItems' => $orderItems]);
    }
}
