<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreignId('user_id')->constrained('users');
            $table->unsignedBigInteger('kriteria1_id');
            $table->foreign('kriteria1_id')->references('id')->on('data_kriteria');
            // $table->foreignId('kriteria1_id')->constrained('data_kriteria');
            $table->unsignedBigInteger('kriteria2_id');
            $table->foreign('kriteria2_id')->references('id')->on('data_kriteria');
            // $table->foreignId('kriteria2_id')->constrained('data_kriteria');
            $table->double('nilai');
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
        Schema::dropIfExists('nilai_kriteria');
    }
}
