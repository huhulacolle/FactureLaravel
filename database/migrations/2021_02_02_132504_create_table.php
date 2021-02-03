<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LIGUE', function (Blueprint $table) {
            $table->increments('NumLigue', 4);
            $table->string('Nom', 40);
            $table->string('Addrs', 25);
            $table->string('Ville', 25);
            $table->string('CodPost', 15);
            $table->string('Sport', 10);
        });

        Schema::create('prestations', function (Blueprint $table) {
            $table->string('NumPrestation', 4);
            $table->string('Nomtype', 30);
            $table->string('NomMat', 30);
            $table->string('Ville', 25);
            $table->integer('Prix', 5.2);
        });
        // Schema::create('Facture', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        // Schema::create('ContenuFacture', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LIGUE');
        Schema::dropIfExists('prestations');
        Schema::dropIfExists('Facture');
        Schema::dropIfExists('ContenuFacture');
    }
}
