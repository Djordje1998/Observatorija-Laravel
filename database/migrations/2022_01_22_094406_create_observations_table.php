<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->foreignId('scientist_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('star_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->text('cognition');
            $table->timestamps();
            $table->primary(['scientist_id','star_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
