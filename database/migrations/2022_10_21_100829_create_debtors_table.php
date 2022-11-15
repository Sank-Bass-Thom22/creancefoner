<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->index('id')->unsigned();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 25)->nullable();
            $table->string('servicename', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone', 25)->unique();
            $table->string('matricule', 10)->unique()->nullable();
            $table->string('role', 11);
            $table->string('serviceindex')->nullable();
            $table->string('debtorindex')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('debtors');
    }
}
