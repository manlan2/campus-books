@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <search></search>
        {{-- <img class="home-top" src="/images/home-top.png" alt=""> --}}
        <slider></slider>
        <div class="hot-replies">
            <h4>热门回答</h4>
            <p onclick="location.href='/threads'">查看更多</p>
            <img src="/images/arrow.png" alt="" class="arrow">
        </div>
        @foreach ($trendingThreads as $thread)
            <thread :attributes="{{ $thread }}"></thread>
            <div style="height: 10px;"></div>
        @endforeach
        <div class="hot-replies">
            <h4>热门求购</h4>
            <p onclick="location.href='/demands'">查看更多</p>
            <img src="/images/arrow.png" alt="" class="arrow">
        </div>
        @foreach ($trendingDemands as $demand)
            <demand-trending :attributes="{{ $demand }}"></demand-trending>
        @endforeach
        <div style="height: 10px;"></div>
        <book-trending :trendingpbooks="{{ json_encode($trendingPbooks) }}" :trendingebooks="{{ json_encode($trendingEbooks) }}"></book-trending>
    </div>
    <div style="height: 1.32rem"></div>
    <div class="menu con">
        <li><a href="{{ route('home') }}" class="menu-item on"><img src="/images/home-on.png" alt="">首页</a></li>
        <li><a href="{{ route('categories.index') }}" class="menu-item"><img src="/images/category.png" alt="">分类</a></li>
        <li><a href="{{ route('posts.index') }}" class="menu-item post"><img src="/images/post.png" alt="">发布</a></li>
        <li><a href="{{ route('threads.index') }}" class="menu-item"><img src="/images/thread.png" alt="">问答</a></li>
        <li><a href="{{ route('user.index') }}" class="menu-item"><img src="/images/user.png" alt="">我的</a></li>
    </div>
</div>
@endsection
