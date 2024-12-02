<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Smart Training System') }}  
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <a class="nav-link" href="{{ route('user.index') }}">Users</a> 
                    <span>|</span>
                    <a class="nav-link " href="{{ route('levels.index') }}">Levels</a>
                    <span>|</span>
                    <a class="nav-link" href="{{ route('lessons.index') }}">Lessons</a>
                    <span>|</span>
                    <a class="nav-link" href="{{ route('questions.index') }}">Questions</a>
                    <span>|</span>
                    <a class="nav-link" href="{{ route('answers.index') }}">Answers</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
