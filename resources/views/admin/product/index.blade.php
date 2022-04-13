@extends('layouts.admin')

@section('title')
    <title>Danh sách sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/product/index/list.css') }}">
@endsection



@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'product', 'key'=> 'list'])   
    <div class="content">
      <form action="">
        <div class="container-fluid">
          <div class="row">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">add</a>
            <div class="col-md-12">
              <div class="status">
                @if (session('status'))
                  <div class="alert alert-success"> 
                    {{ session('status') }}
                  </div>
                @endif
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">
                      <input name="checkall" type="checkbox">
                    </th> 
                    <th scope="col">STT</th> 
                    <th scope="col">Tên</th> 
                    <th scope="col">Giá</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">cấu hình</th>
                    <th scope="col">Thao tác</th>
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)                 
                    <tr>
                      <td>
                        <input type="checkbox" name="list_check[]" value="">
                      </td>
                      <th scope="row">{{ $product->id }}</th> 
                      <td>{{ $product->name }}</td>
                      <td>{{ number_format($product->price) }}</td>
                      <td>
                        @if (!empty($product->feature_image_path))
                        <a href="">
                          <img class="img" src="{{ asset($product->feature_image_path) }}" alt="">
                        </a>
                        @endif 
                      </td>
                      <td>{{ $product->category->name }}</td>
                      <td><a href="{{ route('info.index', $product->id) }}">thông tin sản phẩm</a></td>
                      <td class="d-flex">                        
                          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-default mr-2">Edit</a>                         
                          <a href="" data-url="{{ route('product.delete', $product->id) }}" class="btn btn-danger action_delete">Delete</a>                   
                      </td> 
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="col-md-12">
                {{ $products->links() }}
              </div>
            </div>
          </div>
        </div>
      </form>     
    </div>
  </div>
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('/admins/product/index/list.js') }}"></script>
  
@endsection