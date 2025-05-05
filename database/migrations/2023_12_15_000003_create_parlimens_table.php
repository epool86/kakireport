<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parlimens', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // P.xxx format
            $table->string('name');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->integer('electorate_count')->nullable();
            $table->string('mp_name')->nullable();
            $table->string('mp_party')->nullable();
            $table->date('last_election_date')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('last_redelineation_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('state_id');
            $table->index('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parlimens');
    }
}; 