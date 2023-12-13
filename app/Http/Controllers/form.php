<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\form2;
use App\Models\data;

class form extends Controller
{
    public function form(){
        $url=url('/form');
        $title = "user information";
        $data = compact ('url' ,'title');
        return view('form')->with($data);
    }

    public function reg(Request $request){
       print_r($request->all());
       $request->validate([
        'name' =>'required',
        'email' =>'required',
        'password' =>'required'
       ]);

       $students = new form2 ();
       $students-> name = $request['name'];
       $students-> email = $request['email'];
       $students-> password = $request['password'];
       $students->save();
       return redirect('view');
    }
    public function view(){
        $stddata= form2::all();
        $data = compact('stddata');
        return view('view')->with($data);
    }

    public function delete($id){
        $delete = form2::find($id)->delete();
        return redirect('view');
    }

    public function edit($id){
        $edit = form2::find($id);
        // dd($edit);
        $url=url('/edit').$id;
        $title = "update user information";
        $records = compact ('edit' , 'url' ,'title');
        return view('edit')->with($records);
    }

    public function update($id , Request $request){
        $edit = form2::find($id);
        $edit->name = $request['name'];
        $edit->email = $request['email'];
        $edit->password = $request['password'];
        $edit->save();
        return redirect('view');
     }

}
