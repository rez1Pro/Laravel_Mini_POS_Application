<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
                $table->text('note')->nullable()->after('date');
        });
    }


    public function down()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
                $table->dropColumn('total');
        });
    }
}