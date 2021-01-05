<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReceiptsController extends Controller
{
    public function destroy($id)
     {
           if(Receipt::findOrFail($id)->delete()){
            Alert::toast('Data successfully Deleted!' , 'success');
            return redirect()->back();           
        }
     }

     public function store(Request $request)
     {
        $request->validate([
            'amount'        => 'required|numeric',
            'date'             => 'required',
            'note'             => 'required|string'
        ]);
        if(Receipt::create($request->only('admin_id','user_id' , 'amount' , 'note'  , 'date'))){
            Alert::toast('Receipt Successfully added' , 'success');
            return redirect()->back();
        }
     }

}