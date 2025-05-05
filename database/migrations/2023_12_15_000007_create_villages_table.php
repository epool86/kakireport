<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pbt_id')->constrained()->onDelete('cascade');
            $table->string('tua_kampung')->nullable();
            $table->integer('population')->nullable();
            $table->date('establishment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('pbt_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('villages');
    }
}; 