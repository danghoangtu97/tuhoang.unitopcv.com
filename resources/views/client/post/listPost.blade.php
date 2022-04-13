@extends('layouts.master')

@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a> 
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($posts as $post)
                            <li class="clearfix">
                                <a href="{{ route('client.detailPost', $post->slug) }}" title="" class="thumb fl-left">
                                    <img src="{{ asset($post->image_path) }}" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="{{ route('client.detailPost', $post->slug) }}" title="" class="title">{{ $post->name }}</a>
                                    <span class="create-date">{{ $post->created_at }}</span>
                                    <p class="desc">{{ $post->description }}</p>
                                </div>
                            </li>
                        @endforeach                     
                    </ul>
                </div>
            </div>
        </div>
       @include('partials.client.sidebarPost')
    </div>
</div>
@endsection