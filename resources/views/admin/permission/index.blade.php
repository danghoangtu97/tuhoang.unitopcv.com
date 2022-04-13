@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'Permission', 'key'=> 'list'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          @if (session('status'))
            <div class="alert alert-success"> 
              {{ session('status') }}
            </div>
          @endif
          <div class="col-md-12">          
              <a href="{{ route('permission.create') }}" class="btn btn-success float-right m-2">add</a>         
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Tên Quyền</th>
                  <th scope="col">module</th>
                  <th scope="col">Thao tác</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $item) 
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->key_code }}</td>
                    <td>
                        <a href="" class="btn btn-default">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="col-md-12">
              {{ $permissions->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection