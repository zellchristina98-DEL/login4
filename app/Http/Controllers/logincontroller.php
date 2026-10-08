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
        $username= $Request->input('u');
        $password= $Request->input('p');
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

    public function home(Request $Request){
        if (session('u')){
            $jalur= new database;
            $hello['hai']=$jalur->tampil('users');
            return view('home', $hello);
        }
        else{
            return redirect()->intended('/');
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->intended('/');
    }

    public function zano (Request $Request){
        $data = $Request -> validate ([
            'name' => 'required', 
            'email' => 'required',
            'password'=> 'required'
        ]);

        database::create($data);

        session(['u'=> $data['name']]);
        return redirect('/home')->with('success','data berhasil disimpan');
    }

    public function tampil(){
        return view ('/girasya');
    }

    public function editview($id){
        $jalur = new database;
        $user = $jalur->pull('users', ['id' => $id]);
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        database::where('id', $id)->update($data);
        return redirect('/home');
    }

    public function delete($id)
    {
        database::where('id', $id)->delete();
        return redirect('/home');
    }

     public function excel(Request $Request){
        if (session('u')){
            $tgl_awal = $Request->input('tgl_awal');
            $tgl_akhir = $Request->input('tgl_akhir');

            $jalur= new database;
            $hello['hai']=$jalur->tampilFilter('users', $tgl_awal, $tgl_akhir);

            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=laporan-users.xls");

            return view('home', $hello);
        } else {
            return redirect()->intended('/');
        }
    }

public function pdf(Request $Request){
    if (session('u')){
        $tgl_awal = $Request->input('tgl_awal');
        $tgl_akhir = $Request->input('tgl_akhir');

        $jalur= new database;
        $hello['hai']=$jalur->tampilFilter('users', $tgl_awal, $tgl_akhir);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('home', $hello);
        return $pdf->download('laporan-users.pdf');
    } else {
        return redirect()->intended('/');
    }
}

public function aksitanggal(Request $Request)
    {
        if (session('u')){
            $tgl_awal = $Request->input('tgl_awal');
            $tgl_akhir = $Request->input('tgl_akhir');

            $jalur = new database;

            if ($tgl_awal && $tgl_akhir) {
                $hello['hai'] = $jalur->tampilFilter('users', $tgl_awal, $tgl_akhir);
            } else {
                $hello['hai'] = $jalur->tampil('users');
            }
            return view('home', $hello);
        } else {
            return redirect()->intended('/');
        }
    }
}