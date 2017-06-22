@extends('layouts.app')



@section('content')

<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
      <h3>添加分类</h3>

      <form class="form-horizontal col-sm-10" action="/admin/category/post" method="post">
            {{ csrf_field() }}
        <div class="form-group">
          <label class="col-sm-2 control-label">分类名称</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" placeholder="分类">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="添加"/>
          </div>
        </div>
      </form>
    </div>

    @include('layouts.sidebar')
  </div>
</div>


@endsection
