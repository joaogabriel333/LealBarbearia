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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profissional-id')->nullable(false);
            $table->bigInteger('cliente-id')->nullable(false);
            $table->bigInteger('servico-id')->nullable(false);
            $table->dateTime('data-hora')->nullable(false);
            $table->string('pagamento')->nullable(false);
            $table->decimal('valor')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};