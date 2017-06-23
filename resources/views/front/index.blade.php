@extends('layouts.app')

@section('content')

<div class="container">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                分类 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-left">
                @foreach($categories as $category)
                    <a href="/product/{{$category->name}}"><li style="text-align:center;">{{ $category->name }}</li></a>
                @endforeach
            </ul>
        </div>


        <div class="row row-offcanvas row-offcanvas-right">        
            <div class="col-xs-12 col-sm-9">
                <h3>商品列表</h3>
                <br>
                @foreach ($products as $product)

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$product->picture}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>￥{{$product->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                  <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/cart/add/{{$product->id}}"class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span> 购买</a>
                                    </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @endsection