<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    下拉菜单 
    <span class="caret"></span>
</button>
<ul class="dropdown-menu pull-left">
    @foreach($categories as $category)
        <li style="text-align:center;"><a href="product/{{ $category->name }}">{{ $category->name }}</a></li>
    @endforeach
</ul>