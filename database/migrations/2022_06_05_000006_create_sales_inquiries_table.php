<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inquiry')->nullable();
            $table->date('tgl_inquiry');
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
