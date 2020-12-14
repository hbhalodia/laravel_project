<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function uploadAvtar(Request $request){

        if($request->hasfile('image')){
            User::uploadAvtar($request->image);
            //$filename = $request->image->getClientOriginalName();
            //$this->DeleteOldImage();    
            //$request->image->storeAs('images',$filename,'public');
            // /auth()->user()->update(['avtaar'=>$filename]);  //the one who is logged in
        }
        //$request->image->store('images','public');        
        return redirect()->back();
    }
    //protected function DeleteOldImage(){
    //    if(auth()->user()->avtaar){
    //        Storage::delete('public/images/'.auth()->user()->avtaar);
    //    }
    //}
    public function index(){
        //return 'I am in User Controller';
        //return view from controller
        /* insert Query
        DB::insert('insert into users (name,email,password) values (?,?,?)', [
            'hit','hit@gmail.com','1234'
        ]);
        */
        /* Select Query
        $users = DB::select('select * from users');
        return $users; 
        */
        /* update query
        DB::update('update users set name= ? where id= 1',['hit bhalodia']);*/
        
        /* Delete Query
        DB::delete('delete from users where id=1');
        */
        //$users = DB::select('select * from users');
        //return $users;

        /* start elequent ORM */

        $user = new User();
        /*to insert in elequamnt 
        $user -> name = 'hit';
        $user -> email = 'ht@gmail.com';
        $user -> password = bcrypt('2345');
        $user -> save();
        */

        /*selecting from elequent */
        //$user = User::all();
        
       // User::where('id',3)->delete();
        //return $user;

        //Updating in Elequant Model
        //User::where('id',7)->update(['name'=>'komal'],['email'=>'hitkumar@gmail.com']);
        
        //how to reduce create part from line 36-39 in one line 
        $data = [
            'name'=>'hitBro',
            'email'=>'hitbro@mail.com',
            'password'=> 'hitbro',
        ];
        //User::create($data);
        
        $user  =User::all();
        return $user;

        
        return view('home');
    }
}
