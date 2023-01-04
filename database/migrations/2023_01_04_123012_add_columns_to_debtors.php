<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDebtors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('debtors', function (Blueprint $table) {
            $table->string('servicelocation')->nullable();
            $table->string('emailDRH', 100)->unique()->nullable();
            $table->string('telephoneDRH', 25)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('debtors', function (Blueprint $table) {
            $table->dropColumn('servicelocation');
            $table->dropColumn('emailDRH');
            $table->dropColumn('telephoneDRH');
        });
    }
}
