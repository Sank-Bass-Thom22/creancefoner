<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->index('id')->unsigned();
            $table->float('amount');
            $table->date('repaymentdate');
            $table->string('repaymentway', 255)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('id_bank')->nullable();
            $table->foreign('id_bank')
            ->references('id')->on('banks')
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
        Schema::dropIfExists('repayments');
    }
}
