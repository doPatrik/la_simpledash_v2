<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id('id_bill');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', '13', '2');
            $table->date('dead_line');
            $table->boolean('is_paid');
            $table->unsignedBigInteger('id_provider');
            $table->timestamps();

            $table->foreign('id_provider', 'fk_bill_provider')->references('id_provider')->on('providers')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
