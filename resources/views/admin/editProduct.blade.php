@extends('admin.layout')

@section('content')
<div class="container">
 <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">新增商品</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/product/edit" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                                            <input id="name" name="id" hidden value="{{$product->id}}"type="text">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">名称</label>
                        <div class="col-md-9">
                            <input id="name" name="name" value="{{$product->name}}"type="text" placeholder="商品名称" class="form-control input-md" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">分类</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        下拉菜单 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-left">
                                        @foreach($categories as $category)
                                            <li style="text-align:center;" onclick="selectCategory(this)">{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </div><!-- /btn-group -->
                                <input type="text" value="{{$product->category}}"class="form-control input-md" id="category" name="category" typ{{$product->description}}e="text"/>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">描述</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="price">价格</label>
                        <div class="col-md-9">
                            <input id="price" value="{{$product->price}}"name="price" type="text" placeholder="商品价格" class="form-control input-md" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">库存</label>
                        <div class="col-md-9">
                            <input id="stock" value="{{$product->stock}}"name="stock" type="text" placeholder="库存" class="form-control input-md" >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="picture">图片</label>
                        <div class="col-md-9">
                            <input id="file" name="file" class="input-file" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" name="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>

                </fieldset>

            </form>
        </div>
    </div>

</div>
@endsection

<script>
function selectCategory(id) {
    var category = $(id).text();
    $('#category').attr({"value": category});
}

</script>