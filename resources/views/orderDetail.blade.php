@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <h3>订单详情</h3>
            <p>用户： {{ $order->user_name }}</p>
            <p>地址： {{ $order->address }} </p>
            <p>电话： {{ $order->phone }} </p>
            <br>
            <h4>商品列表</h4>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>商品名称</th>
                  <th>价格</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orderItems as $orderItem)
                  <tr>
                    <td>{{ $orderItem->product_name }}</td>
                    <td>{{ $orderItem->product_price }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
</div>


@endsection