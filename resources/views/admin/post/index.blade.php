@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/post/all.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'post', 'key' => 'list'])

        <div class="content">
            <form action="">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                        <div class="col">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="search" class="form-control rounded" placeholder="Tìm kiếm"
                                        aria-label="Search" aria-describedby="search-addon" name="keyword"
                                        value="{{ request()->input('keyword') }}" />
                                    <button type="submit" name="btn-search" value="Tìm kiếm"
                                        class="btn btn-outline-primary">search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <form class="form-inline" action="">
                                <div class="form-group">
                                    <select class="form-control select_init" name="category" id="">
                                        <option value="">Chọn danh mục bài viết</option>
                                        <option value="news">24H công nghệ</option>
                                        <option value="system">Bài viết về công ty</option>
                                    </select>
                                    <button type="submit" name="btn-search" value="Tìm kiếm"
                                        class="btn btn-outline-primary">Lọc theo danh mục</button>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                          <a href="{{ route('post.create') }}" class="btn btn-success float-right m-2">add</a>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="checkall">
                                        </th>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên bài viết</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="list_check[]" value="{{ $post->id }}">
                                            </td>
                                            <th scope="row">{{ $post->id }}</th>
                                            <td>{{ $post->name }}</td>
                                            <td>
                                                <img class="image-size" src="{{ asset($post->image_path) }}" alt="">
                                            </td>
                                            <td>{{ $post->category == 'news' ? '24H công nghệ' : 'Bài viết về công ty' }}
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-default mr-2">Edit</a>
                                                <a href="" data-url="{{ route('post.delete', $post->id) }}"
                                                    class="btn btn-danger action_delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admins\delete.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
