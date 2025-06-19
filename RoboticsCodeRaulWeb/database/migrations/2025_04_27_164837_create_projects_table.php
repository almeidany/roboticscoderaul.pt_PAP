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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectname', 50);
            $table->string('designation', 50);
            $table->string('category');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('github_url');
            $table->string('photo')->nullable();
            $table->string('projectcolleagues')->nullable();
            $table->string('description', 2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
