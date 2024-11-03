@extends('layouts.app')

@section('content')

<div style="margin-left:28%">

<div class="mb-2 justify-content-end d-flex">
<a href="{{route('posts.create')}}" style="margin: 10px;" class="float-right btn btn-success">Add Post</a>

</div>

<div class="p-2 m-3 card card-default">

<div class="card-header">Posts</div>

<div class="card-body">
    @if ($posts->count()>0)
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
        </thead>
        <tbody>
        @foreach($posts as $post)

        <tr>
            <td>    
        <img src="{{Storage::url($post->image)  }}" style="width: 85px;height: 70px;">

        </td>

        <td>{{$post->title}}</td>

        <td>
            <a style="color:blue; text-decoration-line:underline; " href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a>
        </td>

          @if ($post->trashed())
          <td>
            <form method="POST" action="{{route('restore-posts',$post->id)}}">
                @csrf
                @method('PUT')
            <button type="submit" class="btn btn-info btn-sm" >Restore</button>

            </form>
            </td>

    @else
    <td>
                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm" >Edit</a>
            </td>

          @endif

            <td>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="" class="btn btn-danger btn-sm" >
                        {{$post->trashed() ? 'Delete ' : 'Trash'}}
                    </button>

                </form>
            </td>

        </tr>


@endforeach

        </tbody>
    </table>

    @else
    <h3 class="text-center">No Posts Yet</h3>
    @endif
    <!-- Delete Confirmation Modal -->

</div>
</div>
</div>

@endsection


