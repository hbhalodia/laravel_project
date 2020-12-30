@extends('todos.layout')

@section('content')
    <h1 class="text-2xl border-b pb-3">Update this todo!!</h1>
    <x-alert />
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
        @csrf
        @method('patch')
        <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded-lg"/>
        <input type="submit" value="Update" class="p-2 border rounded-lg" />
    </form>
    <a href="/todos" class="m-5 py-1 px-1 bg-green-400 cursor-pointer rounded text-white">All todos</a>
@endsection