<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\OrderItem;

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
        $carts = Cart::where('user_id',Auth::user()->id)->get();

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

        $carts = Cart::where('user_id',Auth::user()->id)->get();

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
        DB::beginTransaction();
        try {
            $carts = Cart::where('user_id', Auth::user()->id)->get(); // 获取用户购物车

            $order = new Order();  // 新建订单
            $order->user_id = Auth::user()->id;
            $order->status = 0;
            
            $total = 0;
            foreach($carts as $cart) {
                $total += $cart->product->price;
            }
            $order->price = $total;  // 订单总价
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_name = $request->user_name;
            $order->save();
            
            foreach($carts as $cart) {
                $product = Product::where('name', $cart->product->name)->first();
                $product->stock -= 1; // 库存小于0时会引发异常
                $product->save();
                $orderItem = new OrderItem(); // 新建订单明细，保存订单中的每个商品交易
                $orderItem->order_id = $order->id;
                $orderItem->product_name = $cart->product->name;
                $orderItem->product_price = $cart->product->price;
                $orderItem->save();
                $cart->delete(); // 删除购物车
            }
            DB::commit(); // 提交事务
        } catch (\Exception $e) {
            DB::rollback(); //检测到异常，事务回滚
            echo '<h1>库存不足!!</h1>';
            echo $e->getMessage();
            echo $e->getCode();
            return;
        }
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('front.listOrder', ['orders' => $orders]);
    }

    public function detailOrder(Request $request)
    {
        $order = Order::find($request->id);
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        return view('orderDetail', ['order' => $order, 'orderItems' => $orderItems]);
    }

    public function getProduct(Request $request)
    {
        $product = Product::find($request->id);
        return view('front.product', ['product' => $product]);
    }
}
