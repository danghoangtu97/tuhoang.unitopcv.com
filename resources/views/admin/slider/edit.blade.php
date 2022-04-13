@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/admins/slider/index/index.css') }}"> 
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'slider', 'key'=> 'edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="">Tên slider</label>
                  <input type="text" name="name" value="{{ $slider->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider">
                </div>
                <div class="form-group">
                    <label for="">Mô tả slider</label>
                    <textarea type="text" name="description" class="form-control" cols="30" rows="10">{{  $slider->description }}</textarea>            
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="image_path" class="form-control-file" placeholder="">
                    <div class="col-md-4">
                        <img class="image" src="{{ asset($slider->image_path)  }}" alt="">
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection