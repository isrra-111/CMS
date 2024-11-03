<div class="col-md-4 col-xl-3">
              <div class="px-4 sidebar py-md-0">

              <h6 class="sidebar-title">Search</h6>

@if (isset($category))
    <form class="input-group" action="{{ route('blog.category', ['category' => $category->id]) }}" method="GET">
@elseif (isset($tag))
    <form class="input-group" action="{{ route('blog.tag', ['tag' => $tag->id]) }}" method="GET">
@else
    <form class="input-group" action="{{ route('posts.search') }}" method="GET">
@endif
    <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->query('search') }}">
    <div class="input-group-addon">
        <span class="input-group-text"><i class="ti-search"></i></span>
    </div>
</form>

<hr>
                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                  @foreach ($categories as $category )
                  <div class="col-6">
                    <a href="{{route('blog.category', ['category' => $category->id])}}">
                {{$category->name}}
                  </a>
                </div>

                  @endforeach
                </div>

                <hr>

                <!-- <h6 class="sidebar-title">Top posts</h6>
                <a class="mb-5 media text-default align-items-center" href="blog-single.html">
                  <img class="mr-4 rounded w-65px" src="../assets/img/thumb/4.jpg">
                  <p class="mb-0 media-body small-2 lh-4">Thank to Maryam for joining our team</p>
                </a>

                <a class="mb-5 media text-default align-items-center" href="blog-single.html">
                  <img class="mr-4 rounded w-65px" src="../assets/img/thumb/3.jpg">
                  <p class="mb-0 media-body small-2 lh-4">Best practices for minimalist design</p>
                </a>

                <a class="mb-5 media text-default align-items-center" href="blog-single.html">
                  <img class="mr-4 rounded w-65px" src="../assets/img/thumb/5.jpg">
                  <p class="mb-0 media-body small-2 lh-4">New published books for product designers</p>
                </a>

                <a class="mb-5 media text-default align-items-center" href="blog-single.html">
                  <img class="mr-4 rounded w-65px" src="../assets/img/thumb/2.jpg">
                  <p class="mb-0 media-body small-2 lh-4">Top 5 brilliant content marketing strategies</p>
                </a> -->

                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
@foreach ($tags as $tag )
<a class="badge badge-secondary" href="{{route('blog.tag',parameters: ['tag' => $tag->id])}}">
    {{$tag->name}}
</a>


@endforeach
                </div>

                <hr>


              </div>
            </div>
