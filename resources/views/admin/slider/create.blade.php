@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'slider', 'key'=> 'Add'])

    <div class="content">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-md-6">
            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="">Tên slider</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mô tả slider</label>
                    <textarea type="text" name="description" value="{{ old('description') }}" class="form-control" cols="30" rows="10"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="">Hình ảnh</label>
                  <input type="file" name="image_path" class="form-control-file" placeholder="">                
                  @error('image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection