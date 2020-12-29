<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['groups']        = Group::arrayOfGroups();
        $this->data['users']           = User::all();
        
        return view('users.users',$this->data);
    }

    public function create(){
        $this->data['groups']         = Group::arrayOfGroups();
        $this->data['page_title']    = "Create A New User";
        $this->data['mode']           = "create";
        $this->data['headline']      = "Create A New User";
        $this->data['button']          = 'Create Now';

        return view("users.form" , $this->data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => "required|min:5|max:20",
            'email'              => "required|email|unique:users",
            'phone'             =>  "required|numeric|unique:users",
            'group_id'        =>  'required'
        ]);

        if($request->all()){
            User::create($request->all());
            Session::flash('success_message','Data Successfully Created!');
            return redirect()->to("/users");
        }else{
            Session::flash('delete_message','Something wents wrong!Please try again!');
            return redirect()->to("/users");
        }
    }

    public function show($id){
        $this->data['user'] = User::find($id);
        return view('users.show',$this->data);          
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']           = User::findOrFail($id);
        $this->data['groups']       = Group::arrayOfGroups();
        $this->data['page_title']  = "Update ".User::findOrFail($id)['name']."'s data";
        $this->data['mode']         = "edit";
        $this->data['headline']    = "Update ".User::findOrFail($id)['name']."'s Data";
        $this->data['button']          = 'Update Now';
        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
            'name'          => "required|min:5|max:20",
            'email'          => "required|email",
            'phone'         =>  "required|numeric",
            'group_id'    =>   'required'
        ]);
        
        if($data = $request->all()){
            $user = User::find($id);
            
            $user->group_id       = $data['group_id'];
            $user->name             = $data['name'];
            $user->email             = $data['email'];
            $user->phone            = $data['phone'];
            $user->address          = $data['address'];
            
            if($user->save() ){
                Session::flash('success_message','Data Successfully Updated!');
                return redirect()->to("/users");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::findOrFail($id)->delete()){
            Session::flash('delete_message','Data successfully Deleted!');
            return redirect()->to("/users");           
        }

    }
}