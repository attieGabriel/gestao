<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_grupos_economicos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposEconomicosTable extends Migration
{
    public function up()
    {
        Schema::create('grupos_economicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->timestamps();
        });
    }

}

