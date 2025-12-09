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
        Schema::table('tenants', function (Blueprint $table) {
            // Campos para cifras estadísticas
            $table->json('cifras')->nullable()->after('ofrecemos');
            
            // Campo para propósitos del programa
            $table->text('propositos')->nullable()->after('vision');
            
            // Campos para plan de estudios (pregrado/posgrado)
            $table->json('plan_estudios')->nullable()->after('propositos');
            
            // Líneas de investigación
            $table->json('lineas_investigacion')->nullable()->after('plan_estudios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn(['cifras', 'propositos', 'plan_estudios', 'lineas_investigacion']);
        });
    }
};
