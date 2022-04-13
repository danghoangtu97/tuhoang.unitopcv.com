<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('feature_image_path')->nullable();
            $table->text('content');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('feature_image_name')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('parent_category');
            $table->integer('view')->nullable();
            $table->integer('best_seller')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
