@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b pb-3 px-4">
        <h1 class="text-2xl  pb-3">Update this todo!!</h1>
        <a href="{{route('todo.index')}}" class="mx-5 py-2 px-2 text-gray-400 cursor-pointer text-white">
            <span class="fas fa-arrow-left fa-lg">
            </span>
        </a>
    </div>
    <x-alert />
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
        @csrf
        @method('patch')
        <div class="p-2">
            <div class="py-2">
                <input type="text" name="title" value="{{$todo->title}}" placeholder="Title" class="py-2 px-2 border rounded-lg"/>
            </div>
            <div class="py-2">
                <textarea name="description" rows="3" cols="22" placeholder="Description" class="py-2 px-2 rounded-lg border" id="" >{{$todo->description}}</textarea>
            </div>
            <div class="py-2">
                <input type="submit" value="Update" class="p-2 border rounded-lg" />
            </div>
        </div>
    </form>
@endsection