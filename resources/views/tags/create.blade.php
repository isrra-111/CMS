@extends('layouts.app')

@section('content')

<div style="margin-left:28%">

<div class="p-2 m-3 card card-default">

<div  class="card-header">

{{ isset($category) ? 'Edit Tag' : 'Create Tag'}}
</div>

<div class="card-body">

@include('partials.errors')

    <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">

@csrf
@if (isset($tag))
    @method('PUT')
@endif

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{ isset($tag) ? $tag->name : '' }}" class="form-control" name="name" id="name">
</div>

<br>

<div class="form-group">
    <button class="btn btn-success">
        {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
    </button>
</div>
</form>

</div>
</div>




</div>
@endsection
