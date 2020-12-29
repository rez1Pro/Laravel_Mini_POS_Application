<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;

class AdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            'name'                          => 'Rezwan Hossain Sajeeb',
            'phone'                         => '01797840513',
            'address'                       => 'Jhunagach Chapani , Dimla , Nilphamari',
            'email'                          => 'admin@example.com' , 
            'password'                    =>  Hash::make("12345678"),
            'email_verified_at'       => now(),
        ];
        Admin::create($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}