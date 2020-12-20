<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Group;
use Illuminate\Support\Facades\Session;


class UserGroupController extends Controller
{
    public function index(){
         $this->data['data'] = Group::all();
        return view('group.group',$this->data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => "required|unique:groups"
        ]);
      if( Group::create($request->all())){

        session::flash('success_message', 'Group Successfully Created!');
        return redirect()->to('/group');
      }

    }

    public function delete($id){
     if( Group::find($id)->delete()){
        session::flash('delete_message', 'Group Successfully Deleted!');
        return redirect()->to('/group');
     }

    }


}