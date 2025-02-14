@extends('layouts.app')

@section('content')

<div style="margin-left:28%">

<div class="p-2 m-3 card card-default">

<div  class="card-header">

{{ isset($category) ? 'Edit Category' : 'Create Category'}}
</div>

<div class="card-body">

@include('partials.errors')

    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">

@csrf
@if (isset($category))
    @method('PUT')
@endif

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{ isset($category) ? $category->name : '' }}" class="form-control" name="name" id="name">
</div>

<br>

<div class="form-group">
    <button class="btn btn-success">
        {{ isset($category) ? 'Update Category' : 'Add Category' }}
    </button>
</div>
</form>

</div>
</div>




</div>
@endsection
