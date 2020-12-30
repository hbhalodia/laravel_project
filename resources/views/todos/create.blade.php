@extends('todos.layout')

@section('content')
    <h1 class="text-2xl border-b pb-3">What The Next Task You want to Do!!</h1>
    <x-alert />
    <form method="post" action="/todos/create" class="py-5">
        @csrf
        <input type="text" name="title" class="py-2 px-2 border rounded-lg"/>
        <input type="submit" value="create" class="p-2 border rounded-lg" />
    </form>
    <a href="/todos" class="m-5 py-1 px-1 bg-green-400 cursor-pointer rounded text-white">All todos</a>
@endsection