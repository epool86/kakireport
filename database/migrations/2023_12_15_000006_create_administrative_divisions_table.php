<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrative_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pbt_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->date('establishment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('pbt_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrative_divisions');
    }
}; 