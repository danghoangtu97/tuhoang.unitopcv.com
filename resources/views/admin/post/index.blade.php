@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/post/all.css') }}"> 
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'post', 'key'=> 'list'])

    <div class="content">
      <form action="">
        {{-- <div class="container">
          <div class="row">
            @can('post-action')
              <div class="col">            
                  <div class="input-group">
                    <select class="custom-select" name="act" id="inputGroupSelect04">
                      <option>Chọn thao tác</option>
                      @foreach ($list_action as $action => $value)
                          <option value="{{ $action }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-append">
                      <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                  </div>                          
              </div>
            @endcan 
              <div class="col">            
                  <a href="{{ request()->fullUrlWithQuery(['status'=>'active']) }}" class="text-primary ">Kích hoạt<span class="text-muted">({{ $count[1] }})</span></a>
                  <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary  mr-3">Vô hiệu hóa<span class="text-muted">({{ $count[0] }})</span></a>
              </div>
              <div class="col">
                @can('post-create')
                  <a href="{{ route('post.create') }}" class="btn btn-success float-right m-2">add</a>
                @endcan                        
              </div>
          </div>
        </div> --}}
        <div class="container-fluid">
          @if (session('status'))
            <div class="alert alert-success"> 
              {{ session('status') }}
            </div>
          @endif
          <div class="row">
            <a href="{{ route('post.create') }}" class="btn btn-success float-right m-2">add</a>
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
                      <td>{{ ($post->category == 'news')?'24H công nghệ':'Bài viết về công ty' }}</td>
                      <td>{{ $post->created_at }}</td>
                      <td class="d-flex">                        
                          <a href="{{ route('post.edit', $post->id) }}" class="btn btn-default mr-2">Edit</a>                       
                          <a href="" data-url="{{ route('post.delete', $post->id) }}" class="btn btn-danger action_delete">Delete</a>
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