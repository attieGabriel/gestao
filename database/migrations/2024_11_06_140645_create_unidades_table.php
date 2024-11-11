<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_unidades_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia');
            $table->string('razao_social');
            $table->string('cnpj')->unique();
            $table->foreignId('bandeira_id')->constrained('bandeiras');
            $table->timestamps();
        });
    }

}

