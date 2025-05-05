<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('duns', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // N.xx format
            $table->string('name');
            $table->foreignId('parlimen_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->integer('electorate_count')->nullable();
            $table->string('assemblyperson_name')->nullable();
            $table->string('assemblyperson_party')->nullable();
            $table->date('last_election_date')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('last_redelineation_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('parlimen_id');
            $table->index('state_id');
            $table->index('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('duns');
    }
}; 