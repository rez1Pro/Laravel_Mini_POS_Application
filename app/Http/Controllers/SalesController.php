<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SalesController extends Controller
{
     public function destroy($id)
     {
           if(SaleInvoice::findOrFail($id)->delete()){
            Alert::toast('Data successfully Deleted!' , 'success');
            return redirect()->back();           
        }
     }
}