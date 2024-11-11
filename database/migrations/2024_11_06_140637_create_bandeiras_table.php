<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandeirasTable extends Migration
{
    public function up()
    {
        Schema::create('bandeiras', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->foreignId('grupo_economico_id')->constrained('grupos_economicos');
            $table->timestamps();
        });
    }

}
