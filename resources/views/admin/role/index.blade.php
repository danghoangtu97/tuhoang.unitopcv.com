@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/slider/index.css') }}">
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'Role', 'key'=> 'list'])

    <div class="content">
      <form action="">
        <div class="container-fluid">
          <div class="row">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <a href="{{ route('role.create') }}" class="btn btn-success float-right m-2">add</a>
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th> 
                    <th scope="col">#</th> 
                    <th scope="col">Tên vai trò</th>
                    <th scope="col">Mô tả vai trò</th>
                    <th scope="col">Thao tác</th>
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role)
                    <tr>
                      <td>
                        <input type="checkbox" name="list_check[]" value="">
                      </td>
                      <th scope="row">{{ $role->id }}</th>
                      <td>{{ $role->name }}</td>
                      <td>{{ $role->display_name }}</td>
                      <td>                       
                          <a href="{{ route('role.edit', $role->id) }}" class="btn btn-default">Edit</a>                   
                          <a href="" data-url="{{route('role.delete', $role->id) }}" class="btn btn-danger action_delete">Delete</a>                                            
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="col-md-12">
                {{ $roles->links() }}
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
