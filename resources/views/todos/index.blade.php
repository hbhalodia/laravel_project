@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b pb-3 px-4">
        <h1 class="text-2xl">All Your todos </h1>
        <a href="{{route('todo.create')}}" class="mx-5 py-2 px-2 text-blue-400 cursor-pointer text-white">
            <span class="fas fa-plus-circle fa-lg">
            </span>
        </a>
    </div>
    <x-alert />
    <ul class="my-5">
        @foreach ($todos as $todo)
            <li class="flex justify-between p-3">
                <div>
                    @include('todos.completeButton')  
                </div>

                @if($todo->completed)
                    <p class="line-through">{{$todo->title}}</p>
                @else
                    <p>{{$todo->title}}</p>  
                @endif
                
                <div>
                    <a href="{{route('todo.edit',$todo->id)}}" class="py-1 px-1 text-yellow-500 cursor-pointer  text-white"><span class="fas fa-edit px-2 "></span></a>

                    <span onclick="event.preventDefault();
                        if(confirm('Are you sure you want to delete the task')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                        }" class=" py-1 px-1 text-red-500 cursor-pointer fas fa-trash px-2 ">
                    </span>
                    <form id={{'form-delete-'.$todo->id}} action="{{route('todo.destroy',$todo->id)}}" method="POST" style="display: none">
                        @csrf
                        @method('delete')
                    </form> 
                </div>     
            </li>        
        @endforeach
    </ul>    
@endsection