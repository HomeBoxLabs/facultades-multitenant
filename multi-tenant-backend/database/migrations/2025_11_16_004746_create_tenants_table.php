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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('subdomain')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('color_primario')->default('#3b82f6');
            $table->string('color_secundario')->default('#1e40af');
            $table->string('color_acento')->nullable();
            $table->json('menu')->nullable();
            $table->string('presentacion_titulo')->nullable();
            $table->text('presentacion_texto')->nullable();
            $table->json('ofrecemos')->nullable();
            $table->text('historia')->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->string('organigrama')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->json('redes_sociales')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
