@extends('admin.layout')

@section('content')
<div class="container">
        <div class="row row-offcanvas row-offcanvas-right">        
            <div class="col-xs-12 col-sm-9">
                <h3>商品列表</h3>
                <a href="/admin/product/add"><button type="button" class="btn btn-success" data-toggle="offcanvas">添加商品</button></a>
                <br>
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
                                        <a href="/admin/product/delete/{{$product->id}}" class="btn btn-danger btn-product">删除</a>
                                         <a href="/admin/product/edit/{{$product->id}}" class="btn btn-product">编辑</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

                @include('layouts.sidebar')
        </div>
    </div>
@endsection