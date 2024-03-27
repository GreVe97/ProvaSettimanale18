<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attivitas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descrizione');
            $table->enum("giorno",["Lunedì", "Martedì", "Mercoledì","Giovedì","Venerdì"]);
            $table->string("ora");
            $table->integer("sala");
            $table->foreignId('corso_id');
            $table->foreign('corso_id')->on('corsos')->references('id')
            ->onDelete('cascade')->onUpdate('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attivitas');
    }
};
