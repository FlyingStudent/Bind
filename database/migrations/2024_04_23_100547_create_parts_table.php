<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_part_id');
            $table->foreign('category_part_id')
            ->references('id')
            ->on('categories_part')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price');
            $table->string('picture_url');
            $table->decimal('assessment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
};
