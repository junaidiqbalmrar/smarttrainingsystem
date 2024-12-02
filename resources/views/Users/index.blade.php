@extends('Layouts.layout')
@section('title')
    Users
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light " >
    <div  class="collapse navbar-collapse">
   
        <ul class="navbar-nav">
            <li class="nav-itm"> <a class="navbar-brand" ><h4>Users</h4></a></li>
            {{-- <li class="nav-itm"> <a class="nav-link" href="{{route('register')}}">Create</a></li> --}}
        </ul>
    </div>  
</nav>
<div class="card-body">
<table class="table table-bordered table-stiped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center">Role</th> 
            <th class="text-center">Operations</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}} </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td class="text-center">{{$user->role}}</td>
            <td class="text-center">
                <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning btn-sm ">Details</a>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>

</div> 
</div>
</div>
</div>
</div>
</div>
@endsection