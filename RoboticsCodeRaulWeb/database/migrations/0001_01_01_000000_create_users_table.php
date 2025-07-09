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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // This automatically creates an auto-incrementing primary key 'id'
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->unsignedBigInteger('schoolnumber')->unique();
            $table->date('birth_date');
            $table->unsignedBigInteger('phonenumber')->unique(); // Removed auto_increment and primary key
            $table->string('class', 10);
            $table->string('tshirt_size', 3);
            $table->enum('food_allergies', ['sim', 'nao']);
            $table->enum('image_authorization', ['sim', 'nao']);
            $table->string('photo')->nullable();
            $table->string('allergies_description', 400)->nullable();
            $table->string('email', 75)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->integer('raffles_given')->default(0);
            $table->integer('raffles_sold')->default(0);
            $table->integer('raffles_toReturn')->default(0);
            $table->integer('total_sold_byuser')->default(0);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
