@extends('admin.layout')

@section('content')



<div class="container">


    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <h3>分类列表</h3>
            <a href="/admin/category/add"><button type="button" class="btn btn-primary" data-toggle="offcanvas">添加分类</button></a>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>分类名称</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><a href="/admin/product/list/{{ $category->name }}"><button type="button" class="btn btn-primary">浏览商品</button></a></td>
                    <td><a href="/admin/category/delete/{{ $category->id }}"><button type="button" class="btn btn-danger">删除分类</button></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>

            @include('layouts.sidebar')
    </div>



 </div>
@endsection
