<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0);
            $table->enum('role', ['admin', 'moderator', 'user'])->default('user');
            $table->string('ic')->nullable();
            $table->string('ic_front')->nullable();
            $table->string('ic_back')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'status', 'role', 'ic', 'ic_front', 'ic_back',
                'address_1', 'address_2', 'postcode', 'city',
                'state', 'phone', 'photo'
            ]);
            $table->dropSoftDeletes();
        });
    }
};
