<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->decimal('area_sqkm', 10, 2)->nullable();
            $table->integer('population')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('state_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('districts');
    }
}; 