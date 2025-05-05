<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('capital_city');
            $table->enum('ruler_type', ['Sultan', 'Raja', 'Yang di-Pertuan Besar', 'Yang di-Pertuan Agong', 'Governor', 'None']);
            $table->string('ruler_title')->nullable();
            $table->date('establishment_date')->nullable();
            $table->decimal('area_sqkm', 10, 2)->nullable();
            $table->integer('population')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
}; 