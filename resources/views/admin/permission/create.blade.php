@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'Permission', 'key'=> 'Add'])  

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form method="POST" action="{{ route('permission.store') }}"> 
              @csrf
                <div class="form-group">
                    <label for="" >Chọn menu cha</label>
                    <select class="form-control" name="module_parent"  id="">
                      <option value="0">Chọn module cha</option>
                      @foreach (config('permissions.table_module') as $moduleItem)
                      <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>      
                      @endforeach                                                        
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      @foreach (config('permissions.module_children') as $module_children => $v)
                        <div class="col-md-3">
                          <label for="">
                            <input type="checkbox" name="module_children[]" value="{{ $module_children }}">
                          </label>
                          {{ $v }}
                        </div>
                      @endforeach
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