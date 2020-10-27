<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Group;
use Illuminate\Support\Facades\Session;


class UserGroupController extends Controller
{
    public function index(){
         $this->data['data'] = Group::all();
        return view('group.group',$this->data);
    }

    public function create(Request $request){
      if( Group::create($request->all())){
        session::flash('message', 'Group Successfully Created!');
        return redirect()->to('/group');
      }else{
          return "Something wents wrong!";
      }
        
    }

    public function delete($id){
     if( Group::find($id)->delete()){
        session::flash('message', 'Group Successfully Deleted!');
        return redirect()->to('/group');
     }

    }


}