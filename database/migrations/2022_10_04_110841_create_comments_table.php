<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->text('text');
            $table->foreignId('material_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
