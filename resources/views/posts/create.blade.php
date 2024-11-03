@extends('layouts.app')

@section('content')

<div style="margin-left:28%">

<div class="p-2 m-3 card card-default">

<div  class="card-header">
{{isset($post) ? 'Edit Post':'Create Post'}}
</div>
<div class="card-body">

@include('partials.errors')


    <form action="{{isset($post) ? route('posts.update',$post->id) : route(name: 'posts.store')}}" method="POST" enctype="multipart/form-data">

@csrf

@if (isset($post))
    @method('PUT')
@endif

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title :''}}">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea cols="5" rows="5" class="form-control" name="description" id="description">{{isset($post) ? $post->description :''}}</textarea>

</div>

<div class="form-group">
    <label for="content">Content</label>
    <input id="content" type="hidden"  value="{{isset($post) ? $post->content :''}}" name="content">
    <trix-editor input="content"></trix-editor>
</div>

<div class="form-group">
    <label for="published_at">Publish At</label>
    <input type="datetime-local" name="published_at" id="published_at"  value="{{isset($post) ? $post->published_at :''}}" class="form-control">
</div>
<br>
@if (isset($post))
<div class="form-group">
        <img src="{{Storage::url($post->image)  }}" style="width: 50vh;">
</div>
@endif
<br>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image" id="image">
</div>
<br>
<div class="form-group">
<label for="category">Category</label>
<select name="category" id="category" class="form-control">
   @foreach ($categories as $category )
    <option value="{{$category->id}}"
   @if (isset($post))
    @if($category->id==$post->category_id)
  selected
    @endif
   @endif
    >
{{$category->name}}
    </option>

   @endforeach
</select>

</div>
<br>
@if ($tags->count()>0)

<div class="form-group">
<label for="tags">Tags</label>

<select name="tags" id="tags" class="form-control tags-selector">

@foreach ($tags as $tag)

<option value="{{$tag->id}}"
@if (isset($post))

@if ($post->hasTag($tag->id))
selected
@endif

@endif

>
{{$tag->name}}

</option>
@endforeach
</select>
</div>
@endif

<br>

<div class="form-group">
    <button class="btn btn-success">
        {{ isset($post) ? 'Update Post' : 'Add Post' }}
    </button>
</div>
</form>

</div>
</div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script>
    flatpicker('#published_at',{
        enableTime:true
    })

    $(document).ready(function() {
    $('.tags-selector').select2();
})

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
