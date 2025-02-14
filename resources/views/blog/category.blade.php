@extends('layouts.blog')

@section('title')
    Category {{$category->name}}
@endsection

@section('header')
<header class="text-center text-white header" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-8">
                <h1>{{$category->name}}</h1>
                <p class="mt-6 lead-2 opacity-90">Read and get updated on how we progress</p>
            </div>
        </div>
    </div>
</header><!-- /.header -->
@endsection

@section('content')
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @forelse ($posts as $post)
                            <div class="col-md-6">
                                <div class="mb-6 border card hover-shadow-6 d-block">
                                    <a href="{{ route('blog.showSinglePost', ['post' => $post->id]) }}">
                                        <img class="card-img-top" src="{{ Storage::url($post->image) }}" alt="Card image cap">
                                    </a>
                                    <div class="p-6 text-center">
                                        <p>
                                            <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('blog.showSinglePost', ['post' => $post->id]) }}">
                                                {{$post->category->name}}
                                            </a>
                                        </p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="{{ route('blog.showSinglePost', ['post' => $post->id]) }}">
                                                {{$post->title}}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">
                                No results found for query
                                <strong>{{request()->query('search')}}</strong>
                            </p>
                        @endforelse
                    </div>

                    {{$posts->appends(['search'=>request()->query('search')])->links()}}
                </div>

                @include('partials.sidebar')
            </div>
        </div>
    </div>
</main>
@endsection
