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
        Schema::create('materialapoyos', function (Blueprint $table) {
            $table->id();
            $table->string('no_unidad',50);
            $table->string('materia',7);
            $table->string('grupo',3);
            $table->string('periodo',10);
            $table->string('rfc',13);
            $table->string('id_material_apoyo',2);
            $table->string('materiales_apoyo',255);
            $table->text('materiales_apoyo1');
            $table->timestamps();
            
           
            // Añade marcas de tiempo si es necesario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialapoyos');
    }
};
