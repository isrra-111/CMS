@extends('layouts.blog')

@section('title', 'Search results for ' . $search)

@section('content')
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <h2>Search results for "{{ $search }}"</h2>
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
                                                {{ $post->category->name }}
                                            </a>
                                        </p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="{{ route('blog.showSinglePost', ['post' => $post->id]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No results found for "{{ $search }}"</p>
                        @endforelse
                    </div>

                    {{ $posts->appends(['search' => request()->query('search')])->links() }}
                </div>

                @include('partials.sidebar')
            </div>
        </div>
    </div>
</main>
@endsection
