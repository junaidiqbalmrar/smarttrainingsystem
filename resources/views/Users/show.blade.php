@extends('Layouts.layout')
@section('title')
User Details
@endsection
@section('content')
    {{--App\Models\User::all() --}}

   <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th colspan="3" class="text-center"><strong>User Details</strong></th>
        </tr>
        <tr>
            <th class="text-center"><strong>Name</strong></th>
            <th class="text-center"><strong>Email</strong></th>
            <th class="text-center"><strong>Role</strong></th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>

            
        </tr>
    </tbody>
    <thead>
        <tr>
            <th colspan="3" class="text-center"><strong>Records</strong></th>
        </tr>
        <tr>
            <th class="text-center"><strong>Lesson Title</strong></th>
            <th class="text-center"><strong>Status</strong></th>
            <th class="text-center"><strong>Check Results</strong></th>
        </tr>
    </thead>
    <tbody>
        
        {{$level = App\Models\Level::with('lessons')->get()}}
            
        @foreach ($attempts as $key )
        <tr class="text-center">
            <td>{{$key->title}}</td>           
                @php
                    $attempt = false;
                @endphp
            @foreach ($key->progress as $item)
                @if ( $item->lesson_id == $key->id )
                @php
                    $attempt = true;
                @endphp
                @endif
            @endforeach
            <td> @if ($attempt==true)
                <span>✔️</span>
                @else
                <span>❌</span>
                @endif
            </td>
            <td> @if ($attempt==true)
                <form action="{{route('results', $key->id)}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">    
                <button type="submit" class="btn btn-success">Results</button>
                </form>
                @else
                <a href="{{--route('lessonprogress', $key->id)--}}" class="btn btn-warning btn-sm text-center">Not Attempted Yet</a> 
                @endif

            </td>
            
        </tr>
        @endforeach
    </tbody>
   </table>
@endsection