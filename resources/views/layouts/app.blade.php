<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('CMS', 'CMS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link href="{{asset('css/app.css')}}"  rel="stylesheet" />
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
            <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
           <link href="{{asset('css/style.css')}}" rel="stylesheet">
           <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


    <!-- Favicons -->

                <script src="{{asset('js/app.app')}}"/>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            @yield('css')
            <style>
.btn-info{
    color: white;
}

li a {
  display: block;
  height: 35px;
  text-align: left;
 background-color: white;
  color: blue;
  margin: 20px;
  padding-left: 10px;
  border-bottom: 1px solid #555;
}

            </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/css/app.css', 'resources/js/page.min.js'])
        @vite(['resources/css/app.css', 'resources/js/script.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                       CMS
                    </div>
                </header>
            @endisset

            <main class="container py-4">

<div class="w3-sidebar w3-bar-block w3-light-grey" style="width:25%;">


            <div class="card">
               <div class="card-body">
               <ul  class="list-group">
                @if (auth()->user()->isAdmin())

      <li class="list-group-item ">
        <a href="{{route('users.index')}}">Users</a>

      </li>
      @endif
   </ul>

   <ul class="list-group">

      <li class="list-group-item ">
        <a href="{{route('posts.index')}}" >Posts</a>

      </li>
   </ul>

   <ul class="list-group">

<li class="list-group-item ">
    <a href="{{route('categories.index')}}" >Categories</a>
</li>
</ul>
<ul style="padding:8px" class="list-group">

<li class="list-group-item ">
    <a href="{{route('tags.index')}}" >Tags</a>

</li>
</ul>
<ul class="list-group">

<li class="list-group-item ">
  <a href="{{route('trashed-posts.index')}}">Trashed Posts</a>
  </li>
</ul>
               </div>
            </div>


  </div>

  @yield('content')

</main>
</html>
