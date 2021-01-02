@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b pb-3 px-4">
        <h1 class="text-2xl  pb-3">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="mx-5 py-2 px-2 text-gray-400 cursor-pointer text-white">
            <span class="fas fa-arrow-left fa-lg">
            </span>
        </a>
    </div>
    <div class="py-3">
        <div>
            <h3 class="text-lg">Description</h3>
            <p>{{$todo->description}}</p>
        </div>
        @if ($todo->steps->count() > 0)
            <div class="my-4">
                <h3 class="text-lg">Steps For this Task</h3>
                @foreach ($todo->steps as $step)
                    <p>{{$step->name}}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection