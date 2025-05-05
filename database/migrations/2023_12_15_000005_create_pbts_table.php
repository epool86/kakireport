<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pbts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['City Hall', 'City Council', 'Municipal Council', 'District Council']);
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->string('president_name')->nullable();
            $table->enum('president_title', ['Datuk Bandar', 'Yang DiPertua'])->nullable();
            $table->decimal('area_sqkm', 10, 2)->nullable();
            $table->integer('population')->nullable();
            $table->date('establishment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('district_id');
            $table->index('state_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pbts');
    }
}; 