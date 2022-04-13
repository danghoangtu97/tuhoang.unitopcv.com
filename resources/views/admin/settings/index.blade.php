@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', [
            'name' => 'Settings',
            'key' => 'list',
        ])
        <div class="content">
            <div class="container-fluid">
                <a href="{{ route('settings.create') }}" class="btn btn-success m-2">add</a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">#</th>
                                    <th scope="col">Config key</th>
                                    <th scope="col">Config value</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $setting->id }}">
                                        </td>
                                        <th scope="row">{{ $setting->id }}</th>
                                        <td>{{ $setting->name }}</td>
                                        <td>{{ $setting->value }}</td>
                                        <td>
                                            <a href="{{ route('settings.edit', $setting->id) }}"
                                                class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{ route('settings.delete', $setting->id) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{ $settings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/admins/product/index/list.js') }}"></script>
@endsection
