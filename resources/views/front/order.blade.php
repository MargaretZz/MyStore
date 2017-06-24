@extends('layouts.app')


@section('content')

<div class="container">
    <div class="col-xs-12 col-sm-9">
       <table class="table table-hover">
                <thead>
                <tr>
                    <th>商品</th>
                    <th class="text-center">小计</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$cart->product->picture}} " style="width: 100px; height: 72px;"></a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$cart->product->name}}</a></h4>
                                </div>
                            </div></td>

                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$cart->product->price}}</strong></td>

                    </tr>
                @endforeach

                <tr>

                    <td><h3>总价</h3></td>
                    <td class="text-right"><h3><strong>${{$total}}</strong></h3></td>
                </tr>
  
                </tbody>
            </table>
      <form class="form-horizontal col-sm-10" action="/order/post" method="post">
            {{ csrf_field() }}
        <div class="form-group">
          <label class="col-sm-2 control-label">地址</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control" placeholder="送货地址">
          </div>
          <br>
          <br>
          <label class="col-sm-2 control-label">电话</label>
          <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" placeholder="电话">
          </div>

          <label class="col-sm-2 control-label">收货姓名</label>
          <div class="col-sm-10">
            <input type="text" name="user_name" class="form-control" placeholder="姓名">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="确定下单 "/>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection