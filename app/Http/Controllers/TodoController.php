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
        return view('todos.index');
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(){
        return view('todos.edittodolist');
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
        Todo::create($request->all());
        return redirect()->back()->with('message','To do created succesfully');
    }

}