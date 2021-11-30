<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reporter_id');
            $table->bigInteger('driver_id');
            $table->string('report_image');
            $table->string('picked_image')->nullable();
            $table->string('finished_image')->nullable();
            $table->string('address_detail');
            $table->string('status')->default('PENDING');
            $table->float('latitude')->default(0);
            $table->float('longitude')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
