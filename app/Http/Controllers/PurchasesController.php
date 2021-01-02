<?php

namespace App\Http\Controllers;

use App\Models\PurchaseInvoice;
use RealRashid\SweetAlert\Facades\Alert;

class PurchasesController extends Controller
{
         public function destroy($id)
     {
           if(PurchaseInvoice::findOrFail($id)->delete()){
            Alert::toast('Data successfully Deleted!' , 'success');
            return redirect()->back();           
        }
     }
}