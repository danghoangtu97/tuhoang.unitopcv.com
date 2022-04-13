@extends('layouts.admin')

@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection

@section('content')
<style>
  .image{
    width: 500px;
    height: auto;
  }
</style>
  <div class="content-wrapper"> 
    @include('partials.admin.header-content', ['name' => 'information', 'key'=> 'index'])

    <div class="content"> 
      <div class="container-fluid">
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="row">
              <div class="col-6">
                @if (!$info_product)
                  <a href="{{ route('info.create', $product->id) }}" class="btn btn-success">Thêm thông tin</a> 
                @endif 
                <a href="{{ route('info.edit', $product->id) }}" class="btn btn-success">cập nhật</a>            
                <a href="{{ route('info.delete', $product->id) }}" class="btn btn-danger">Xóa</a> 
                <div class="form-group">
                  <label for="">Tên sản phẩm </label>
                  <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Tên sản phẩm">
                </div>
              </div>                                                                                      
        </div>
        <div class="row">
          <div class="col-6">
            <h2>Hình ảnh sản phẩm</h2>
              <img class="image" src="{{ asset($product->feature_image_path) }}" alt="">          
          </div>

          @if ($info_product)
          <div class="col-6">
            <h2>Chi tiết sản phẩm</h2>
            {!!  $info_product->information !!}
          </div>
          @else
              <p>sản phẩm không có thông tin chi tiết</p>
          @endif          
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.tiny.cloud/1/eten75gbkeg2ovayo2eur8vnekd9w2sa8ly4golj5stsykia/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script src="{{ asset('client/detailProduct/add.js') }}"></script>
@endsection