<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->index('id')->unsigned();
            $table->float('amount');
            $table->date('startline');
            $table->date('deadline');
            $table->unsignedBigInteger('id_rate');
            $table->foreign('id_rate')
                ->references('id')->on('rates')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_debtor');
            $table->foreign('id_debtor')
                ->references('id')->on('debtors')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
