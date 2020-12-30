@extends('todos.layout')

@section('content')
    <div class="flex justify-center border-b pb-3">
        <h1 class="text-2xl">All todos </h1>
        <a href="/todos/create" class="mx-5 py-1 px-1 bg-blue-400 cursor-pointer rounded text-white">Create New</a>
    </div>
    <x-alert />
    <ul class="my-5">
        @foreach ($todos as $todo)
            <li class="flex justify-between p-3">
                @if($todo->completed)
                    <p class="line-through">{{$todo->title}}</p>
                @else
                    <p>{{$todo->title}}</p>  
                @endif
                <div>
                    <a href="/todos/{{$todo->id}}/edit" class="py-1 px-1 text-red-400 cursor-pointer  text-white"><span class="fas fa-edit px-2 "></span></a>
                    @if($todo->completed)
                        <span class="fas fa-check text-green-400 px-2"></span>
                    @else
                        <span class="fas fa-check text-gray-300 cursor-pointer px-2"></span>   
                    @endif
                    
                </div>
                
            </li>        
        @endforeach
    </ul>    
@endsection