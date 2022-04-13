@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('js')
   <script src="{{ asset('/admins/role/add.js') }}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'role', 'key'=> 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form method="POST" action="{{ route('role.store') }}"  style="width: 100%"> 
            <div class="col-md-12">
                @csrf
                <div class="form-group">
                  <label for="">Tên role</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên role">
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="">Mô tả role</label>
                    <textarea type="text" name="display_name" class="form-control" cols="30" rows="10"></textarea>                  
                    @error('display_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div> 
            </div>
            <div class="col-md-12">    
              <div class="row">
                <div class="col-md-12">  
                  <label for="">
                    <input type="checkbox" class="check_all">  
                  </label>
                  checkAll
                </div>
                @foreach ($permissionParents as $permissionParentsItem)
                  <div class="card  mb-3 border-primary col-md-12" style="width: 100%">
                    <div class="card-header bg-primary text-white">
                      <label for="">
                        <input type="checkbox" class="checkbox_wrapper"  value="">
                      </label>
                      Module {{ $permissionParentsItem->name }}
                    </div>
                    <div class="row">               
                      @foreach ($permissionParentsItem->permissionChildren as $permissionChildrenItem)
                      <div class="card-body text-white">
                        <h5 class="card-title text-primary"> 
                          <label for="">
                            <input type="checkbox" class="checkbox_children" name="permission_id[]" value="{{ $permissionChildrenItem->id }}">
                          </label>
                          {{ $permissionChildrenItem->name }}
                        </h5>
                      </div>
                      @endforeach                    
                    </div>                 
                  </div>
                @endforeach  
              </div>  
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection