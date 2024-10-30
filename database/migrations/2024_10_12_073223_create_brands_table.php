<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name', 100)->unique(); // Brand name with a max length of 100 and unique constraint
            $table->timestamps(); // Timestamps for created and updated
        });
    }

    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
