<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->decimal('price', 8, 2); // Product price
            $table->unsignedInteger('stock_quantity'); // Stock quantity
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for category
            $table->unsignedBigInteger('brand_id')->nullable(); // Foreign key for brand
            $table->timestamps(); // Timestamps for created and updated

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
