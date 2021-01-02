<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
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

}