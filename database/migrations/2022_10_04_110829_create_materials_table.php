<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('preview');
            $table->string('content');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('category_id')->constrained()->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
};
