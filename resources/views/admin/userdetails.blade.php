@extends('Layouts.layout')
@section('title')
User Details
@endsection
@section('content')
    {{-- $results --}}

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
            <td>{{Auth::user()->name}}</td>
            <td>{{Auth::user()->email}}</td>
            <td>{{Auth::user()->role}}</td>
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
        @foreach ($attempts as $key )
        <tr class="text-center">
            <td>{{$key->title}}</td>           
                @php
                    $attempt = false;
                @endphp
            @foreach ($key->progress as $item)
                @if ( $item->lesson_id == $key->id && $item->user_id == Auth::id())
                @php
                    $attempt = true;
                @endphp
                @endif
            @endforeach
            <td> 
                @if ($attempt==true)
                <span>✔️</span>
                @else
                <span>❌</span>
                @endif
            </td>
            <td> 
                @if ($attempt==true)
                <a href="{{route('user.results',$key->id)}}" class="btn btn-success btn-sm text-center" > Results</a>
                @else
                <a href="{{route('level.progress', $key->id)}}" class="btn btn-warning btn-sm text-center">Attempt</a> 
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
   </table>
@endsection