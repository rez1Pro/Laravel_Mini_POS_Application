<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SalesController extends Controller
{
     
    public function store(Request $request)
    {
        $request->validate([
            'challan_no'        => 'required|numeric',
            'date'             => 'required',
            'note'             => 'max:100'
        ]);
        if(SaleInvoice::create($request->only('admin_id','user_id' , 'challan_no' , 'note'  , 'date'))){
            Alert::toast('Receipt Successfully added' , 'success');
            return redirect()->back();
        }
    }

     public function destroy($id)
     {
           if(SaleInvoice::findOrFail($id)->delete()){
            Alert::toast('Data successfully Deleted!' , 'success');
            return redirect()->back();           
        }
     }
}