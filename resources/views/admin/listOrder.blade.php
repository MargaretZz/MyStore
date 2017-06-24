@extends('admin.layout')

@section('content')

<div class="container">


    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <h3>订单列表</h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>价格</th>
                  <th>时间</th>
                  <th>状态</th>
                  <th>详情</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>未支付</td>
                    <td><a href="/admin/order/detail/{{ $order->id }}">详情</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>



 </div>
@endsection