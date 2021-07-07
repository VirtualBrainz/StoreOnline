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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('stock')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->decimal('actualPrice',12,2)->nullable();
            $table->decimal('previousPrice',12,2)->nullable();
            $table->integer('discountRate')->nullable();
            $table->text('shortDescription')->nullable();
            $table->text('longDescription')->nullable();
            $table->string('state')->nullable();
            $table->enum('status',['PUBLISHED','DRAFT'])->default('DRAFT');

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
