<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('ID_PRODUIT');
            $table->string('ID_CATEGORIE');
            $table->string('NOM_PRODUIT');
            $table->string('REF_PRODUIT');
            $table->float('PRIX_HT_PRODUIT');
            $table->text('DESCRIPTION');
            $table->string('IMAGE');
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
        Schema::dropIfExists('produits');
    }
}
