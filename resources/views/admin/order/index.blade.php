@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <div class="content-wrapper">
      @include('partials.admin.header-content', ['name' => 'Order', 'key'=> 'list'])
    <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header font-weight-bold">
              ĐƠN HÀNG MỚI
          </div>
          <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Mã</th>
                          <th scope="col">Khách hàng</th>
                          <th scope="col">Số lượng</th> 
                          <th scope="col">Giá trị</th>
                          <th scope="col">Trạng thái</th>
                          <th scope="col">Thời gian</th>
                          <th scope="col">Tác vụ</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders as $item)                         
                        <tr>
                            <th scope="row">1</th> 
                            <td>{{ $item->code }}</td>
                            <td>
                                {{ $item->customer->name }} <br>
                                {{ $item->customer->phone_number }}
                            </td>
                            <td>{{ $item->total_qty }}</td>
                            <td>{{ number_format($item->total) }}₫</td>
                            <td>{!! $item->status !!}</td> 
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('order.detail', $item->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>        
                    @endforeach                                  
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<style>
  .font-status{
    font-size: 100% !important;
  }
</style>