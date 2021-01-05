<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    
    
    protected $fillable = ['admin_id' ,'user_id' , 'amount' , 'note' , 'date'];

    public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}