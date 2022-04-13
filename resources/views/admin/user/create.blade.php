@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
  <link href="{{ asset('/vendor/select2/select2.min.css') }}" rel="stylesheet"/>
  <link  href="{{ asset('/admins/user/add/add.css') }}" rel="stylesheet">
@endsection

@section('js')
  <script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('/admins/user/add/add.js') }}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'User', 'key'=> 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6"> 
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="">Họ và tên</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên họ và tên">
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Nhập email">
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Mật khẩu</label>
                  <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                  @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Nhập lại mật khẩu</label>
                  <input type="password" name="re-password" class="form-control" placeholder="Nhập mật khẩu">
                  @error('re-password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <select class="form-select form-control" name="role_id[]" multiple aria-label="multiple select example">
                    <option>---Chọn vai trò---</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option> 
                    @endforeach            
                  </select>
                </div>

               
                
                <button type="submit" class="btn btn-primary">Submit</button> 
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection