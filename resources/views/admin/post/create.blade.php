@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'post', 'key'=> 'add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">             
              <div class="form-group">
                <label for="">Tên bài viết</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group"> 
                <label for="">Danh mục</label>
                <select class="custom-select" name="category">
                  <option>Chọn danh mục</option>
                  <option value="news">24H công nghệ</option>
                  <option value="system">Bài viết về công ty</option>
                </select>
                @error('category')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" name="image_path" class="form-control-file">
              </div>                       
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" class="form-control "  rows="10">{{ old('description') }}</textarea>     
              @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nội dung</label>
              <textarea name="content" class="form-control my-editor"  rows="10">{{ old('content') }}</textarea>     
              @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>         
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="https://cdn.tiny.cloud/1/eten75gbkeg2ovayo2eur8vnekd9w2sa8ly4golj5stsykia/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script src="{{ asset('/admins/product/add/add.js') }}"></script>
@endsection