<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id('id_provider');
            $table->string('name', 120);
            $table->string('account_number', 20);
            $table->string('owner_name', 60);
            $table->string('label', 60);
            $table->string('color_code', 10);
            $table->unsignedBigInteger('id_address');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_address', 'fk_provider_address')
                ->references('id_address')->on('provider_addresses')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('id_user', 'fk_provider_user')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
