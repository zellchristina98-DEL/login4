<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\database;

class logincontroller extends Controller
{
    public function index(){
        return view ('/login');
    }
    public function aksilogin(Request $Request){
        echo $username= $Request->input('u');
         echo $password= $Request->input('p');
         $where= array(
            'name'=>$username,
            'password'=> $password
         );

         $jalur= new database;
         $hasilcek=$jalur->pull('users',$where);

         if($hasilcek){
            session(['u'=>$hasilcek->name]);
            return redirect ()->intended('/home');
         }
         else{
             return redirect ()->intended('/');
         }
    }
      public function home(){
        return view ('/home');
    }

    public function logout(){
        session()->flush();
        return redirect()->intended('/');
    }
    public function form (Request $Request){{}
            $data= $Request->validate([
                'name'=>'required',
                 'email'=>'required',
                  'password'=>'required'
            ]);
            database::create($data);
             session(['u' => $data['name']]);
             return redirect('/home')->with('success', 'Data berhasil disimpan');
    }
              public function data(){
        return view ('/inputdata');
    }
}
