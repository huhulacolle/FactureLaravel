<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligue', function (Blueprint $table) {
            $table->increments('NumLigue');
            $table->char('NomSport');
            $table->char('Nom');
            $table->char('Addrs');
            $table->char('Ville');
            $table->integer('CodPost');
            $table->char('Sport');
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
        Schema::dropIfExists('ligue');
    }
}
