@extends('layouts.admin')

@section('css')
    <link href="{{ asset('/vendor/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.admin.header-content', [
            'name' => 'Product',
            'key' => 'Add',
        ])

        <!-- Main content -->
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên danh sản phẩm</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Giá sản phẩm</label>
                                <input type="text" name="price" value="{{ old('price') }}"
                                    class="form-control" placeholder="Nhập giá sản phẩm">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror    
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" name="feature_image_path" class="form-control-file" placeholder="">
                                @error('feature_image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh chi tiết</label>
                                <input type="file" multiple name="img_path[]" class="form-control-file" placeholder="">
                            </div>


                            <div class="form-group">
                                <label for="">Chọn danh mục cho sản phẩm</label>
                                <select class="form-control select_init" name="category_id" id="">
                                    <option value="">Chọn danh mục cho sản phẩm</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="mytextarea" name="contents" class="form-control my-editor" rows="10">{{ old('contents') }}</textarea>
                            </div>
                                @error('contents')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/eten75gbkeg2ovayo2eur8vnekd9w2sa8ly4golj5stsykia/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('/admins/product/add/add.js') }}"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
@endsection
