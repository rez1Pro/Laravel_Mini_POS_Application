<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PaymentsController extends Controller
{
         public function destroy($id)
     {
           if(Payment::findOrFail($id)->delete()){
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
        if(Payment::create($request->only('admin_id','user_id' , 'amount' , 'note'  , 'date'))){
            Alert::toast('Payment Successfully added' , 'success');
            return redirect()->back();
        }
    }
}