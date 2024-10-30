<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique category name
            $table->text('description')->nullable(); // Optional description
            $table->unsignedBigInteger('parent_id')->nullable(); // For hierarchical categories
            $table->timestamps();
            $table->softDeletes(); // Soft deletes for category records
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
