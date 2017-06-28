@extends('layouts.app')

@section('content')


<div class="container">
   <header>
        <h1>产品详情</h1>
    </header>
    <div style="height:1rem;"></div>
    <div class="pro_bigImg">
        <img  width="200" src="{{$product->picture}}"/>
    </div>
    <!--base information-->
    <section class="pro_baseInfor">
        <h2></h2>
        <p>
            <strong></strong>
            <del></del>
        </p>
    </section>
    <!--product attr-->
    <dl class="pro_attr">
        <dt>产品属性信息</dt>
        <dd>
            <ul>
                <li>
                    名字： {{ $product->name}}
                </li>
                <li>
                    价格： {{ $product->price}}
                </li>
                <li>
                    描述： {{ $product->description }}
                </li>
                <li> 库存： {{ $product->stock }} </li>
            </ul>
        </dd>
    </dl>
    <a href="/cart/add/{{$product->id}}"class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span>加入购物车</a>

</div>


@endsection