@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'Category', 'key' => 'list'])
        <div class="content">
            <div class="col">
                <a href="{{ route('category.create') }}" class="btn btn-success float-right m-2">add</a>
                <p>Nhấn vào danh mục để cập nhật và xóa danh mục sản phẩm</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="section" id="category-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">Danh mục sản phẩm</h3>
                        </div>
                        <div class="secion-detail">
                            <ul class="">
                                @foreach ($categories as $category)
                                    <li class="">
                                        <a
                                            href="{{ route('category.edit', $category->id) }}">{{ $category->name }}</a>
                                        @include(
                                            'admin.category.include.categoryChild'
                                        )
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
