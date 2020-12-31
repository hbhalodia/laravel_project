<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $guarded = []; //if does'nt want fillable below;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avtaar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /* if we use hidden not come in webpage */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* defining the mutators 
    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }
    */
    /*defining the accessor 
    public function getNameAttribute($name){
        return 'My name is : '.ucfirst($name);
    }
    */

    public static function uploadAvtaar($image){
        $filename = $image->getClientOriginalName();
        (new Self)->DeleteOldImage();    
        $image->storeAs('images',$filename,'public');
        auth()->user()->update(['avtaar'=>$filename]); 
    }
    
    protected function DeleteOldImage(){
        if(auth()->user()->avtaar){
            Storage::delete('public/images/'.auth()->user()->avtaar);
       }
    }

    public function todos(){
        return $this->hasMany(Todo::class);
    }
}
