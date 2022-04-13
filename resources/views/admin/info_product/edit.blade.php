@extends('layouts.admin')

@section('title')
    <title>cấu hình của sản phẩm</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'configuration', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('info.update', $product->id) }}">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                        placeholder="Tên sản phẩm">
                                </div>
                                <div class="col-md-12">
                                    <img src="{{ asset($product->feature_image_path) }}" class="img-thumbnail" alt="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="mytextarea" name="information" class="form-control my-editor"  rows="10">
                                        {{ $info_product->information }}
                                    </textarea>

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

@section('js')
    <script src="https://cdn.tiny.cloud/1/eten75gbkeg2ovayo2eur8vnekd9w2sa8ly4golj5stsykia/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('client/detailProduct/add.js') }}"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>
@endsection
