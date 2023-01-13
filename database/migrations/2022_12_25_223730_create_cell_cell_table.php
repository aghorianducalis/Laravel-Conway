<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellCellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cell_cell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cell_1_id')->constrained()->on('cells')->onDelete('restrict');
            $table->foreignId('cell_2_id')->constrained()->on('cells')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cell_cell');
    }
}
