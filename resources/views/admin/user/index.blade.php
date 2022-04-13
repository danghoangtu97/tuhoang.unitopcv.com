@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'user', 'key' => 'list'])

        <div class="content">
            <form action="">
                <div class="container-fluid">
                    <div class="row">
                        <a href="{{ route('user.create') }}" class="btn btn-success float-right m-2">add</a>
                        <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <input type="checkbox" name="checkall">
                                            <th>STT</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="list_check[]" value="{{ $user->id }}">
                                                </td>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-default">Edit</a>

                                                    <a href="" data-url="{{ route('user.delete', $user->id) }}"
                                                        class="btn btn-danger action_delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    {{ $users->links() }}
                                </div>
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
