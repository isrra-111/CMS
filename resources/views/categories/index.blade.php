@extends('layouts.app')

@section('content')
<div style="margin-left:28%">

    <div class="mb-2 justify-content-end d-flex">
        <a href="{{route('categories.create')}}" style="margin: 10px;" class="float-right btn btn-success">Add Category</a>
    </div>

    <div class="p-2 m-3 card card-default">
        <div class="card-header">Categories</div>

        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->posts->count()}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Delete Confirmation Modal -->
              <!-- Delete Confirmation Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="deleteDeleteForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this tag?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go back</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
                <h3 class="text-center">No Categories Yet</h3>
            @endif
        </div>
    </div>
</div>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteDeleteForm');
        form.action = '/tags/' + id; // Dynamically update form action
    }
</script>
@endsection
