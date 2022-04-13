@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.admin.header-content', [
            'name' => 'Category',
            'key' => 'Edit',
        ])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Cập nhật danh mục sản phẩm</h5>
                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                    placeholder="Nhập tên danh mục">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Chọn danh mục cha</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h5>Xóa danh mục sản phẩm</h5>
                        <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger action_delete">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

