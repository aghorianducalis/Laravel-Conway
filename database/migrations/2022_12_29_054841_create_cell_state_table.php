<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cell_state', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cell_id')->constrained()->on('cells')->onDelete('restrict');
            $table->foreignId('state_id')->constrained()->on('states')->onDelete('restrict');
            $table->integer('generation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cell_state');
    }
}
