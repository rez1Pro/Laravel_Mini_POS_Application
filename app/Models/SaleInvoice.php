<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleInvoice extends Model
{
    use HasFactory;

    protected $fillable=['user_id' , 'admin_id' , 'challan_no' , 'date' , 'note'];
    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id' , 'id');
    }
}