@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'Settings', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('settings.update', $setting->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="">config key</label>
                                <input type="text" name="name" value="{{ $setting->name }}" class="form-control"
                                    placeholder="Nhập config key">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">config value</label>
                                <input type="text" name="value" value="{{ $setting->value }}" class="form-control"
                                    placeholder="Nhập config value">
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
