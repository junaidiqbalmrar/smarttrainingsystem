<x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Smart Training System') }}  
        </h2>
    </x-slot> 

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     
                <div class="mt-4">
                    <label for="first-textarea" class="block text-sm font-medium text-gray-700 " ><strong>Welcome to the Quiz Challenge!</strong></label>
                    <textarea readonly id="first-textarea" name="first-textarea" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Enter your text here...">
                Get ready to test your knowledge and have fun!
                    This quiz game is designed to challenge your understanding of various topics while providing an engaging and interactive experience.
                    The quiz covers a wide range of topics, including general knowledge, science, history, geography, and pop culture.
                    Here’s how to play:</textarea>
                    </div>   
                  <div class="col-md-3 mt-3">  
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="">Levels</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('user.details')}}">Check Progress</a>
                        </li>
                    </ul>
                  </div> 
                  
                    <div class="col-md-3 mt-3">
                         <ul class="list-group">
                             @foreach ($levels as $levels )
                            <li class="list-group-item list-group-item-dark "> {{ $loop->index + 1 }} - <a href="{{route('lessons.questions',$levels->id)}}" class="" >{{ $levels->level_name }}</a></li>
                             @endforeach
                        </ul>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
