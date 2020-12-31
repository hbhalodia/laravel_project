<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;
use App\Http\Requests\TodoCreateRequest;

class TodoController extends Controller
{
    //
    public function index(){
        $todos = Todo::orderBy('completed')->get();
        //return view('todos.index')->with(['todos'=>$todos]);
        //or
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(Todo $todo){
        //$todo = Todo::find($id);  if directly passing id
        //if passing the model from routeas route model binding
        return view('todos.edittodolist',compact('todo'));
    }

    public function store(TodoCreateRequest $request){

        /* not good below validation we need different logic for that */
        /*
        if(!$request->title){
            return redirect()->back()->with('error','Title Cant be empty');
        }*/

        /*
        $rules = [
            'title' => 'required|max:255',
        ];
        $messages = [
            'title.max' => 'Todo Title should not greater than 255 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages );
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        */
        /*
        $request->validate([
            'title' => 'required|max:255',
        ]);*/

        // Todo::create($request->all());
        //after particular user has to create
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message','To do created succesfully');
    }

    public function update(TodoCreateRequest $request , Todo $todo){
        $todo -> update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message','Todo Updated'); 
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','To do marked as completed!');
    }
    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','To do marked as incompleted!');
    }
    public function destroy(Todo $todo){
        $todo -> delete();
        return redirect()->back()->with('message','To do Deleted!');
    }
}