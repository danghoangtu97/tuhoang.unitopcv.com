@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/admins/slider/index/index.css') }}"> 
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.admin.header-content', ['name' => 'Slider', 'key'=> 'list'])

    <div class="content">
      <form action="">
        {{-- <div class="container">
          <div class="row"> 
            @can('slider-action')
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
                @can('slider-create')
                  <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">add</a>
                @endcan                     
              </div>
          </div>
        </div> --}}
        <div class="container-fluid">
          <div class="row">
            <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">add</a>
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th> 
                    <th scope="col">#</th> 
                    <th scope="col">Tên slider</th>
                    <th scope="col">Miêu tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thao tác</th> 
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sliders as $slider)                                  
                    <tr>
                      <td>
                        <input type="checkbox" name="list_check[]" value="">
                      </td>
                      <th scope="row">{{ $slider->id }}</th>
                      <td>{{ $slider->name }}</td>
                      <td>{{ $slider->description }}</td>
                      <td>
                        <img class="image" src="{{ asset($slider->image_path) }}" alt="">
                      </td>
                      <td>                       
                          <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-default">Edit</a>                                              
                          <a href="" data-url="{{ route('slider.delete', $slider->id) }}" class="btn btn-danger action_delete">Delete</a>                      
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="col-md-12">
                {{ $sliders->links() }} 
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