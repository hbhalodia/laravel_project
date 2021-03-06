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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $todos = auth()->user()->todos()->orderBy('completed')->get(); //at sql level
        //buy using collection -> $todos = auth()->user()->todos->sortBy('completed')->get();
        //$todos = Todo::orderBy('completed')->get();
        //return view('todos.index')->with(['todos'=>$todos]);
        //or
        return view('todos.index',compact('todos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('todos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
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
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
        }
        return redirect(route('todo.index'))->with('message','To do created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo){
        //$todo = Todo::find($id);  if directly passing id
        //if passing the model from routeas route model binding
        return view('todos.edittodolist',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateRequest $request , Todo $todo){
        $todo -> update(['title' => $request->title , 'description' => $request->description]);
        return redirect(route('todo.index'))->with('message','Todo Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo){
        $todo->steps->each->delete();
        $todo -> delete();
        return redirect()->back()->with('message','To do Deleted!');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','To do marked as completed!');
    }
    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','To do marked as incompleted!');
    }

    
}