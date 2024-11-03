@extends('layouts.app')

@section('content')

<div style="margin-left:28%">


<div class="p-2 m-3 card card-default">

<div class="card-header">Users</div>

<div class="card-body">
    @if ($users->count() > 0)
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
        </thead>
        <tbody>
        @foreach($users as $user)

        <tr>
            <td>
            <img style="border-radius: 50%; width: 50px;height: 50px;" src="{{ Gravatar::get($user->email)}}" alt="User Gravatar">
        </td>
        <td>{{$user->name}}</td>

        <td>
           {{$user->email}}
    </td>


            <td>
             @if (!$user->isAdmin())
           <form action="{{route('users.make-admin',$user->id)}}" method="POST">
            @csrf

            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
           </form>
             @endif
            </td>

        </tr>

@endforeach

        </tbody>
    </table>

    @else
    <h3 class="text-center">No Users Yet</h3>
    @endif

</div>
</div>

</div>

@endsection


