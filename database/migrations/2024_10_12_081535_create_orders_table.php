<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
        {
            if (!Schema::hasTable('orders')) {
                Schema::create('orders', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
                    $table->timestamp('order_date')->useCurrent(); 
                    $table->enum('status', ['pending', 'shipped', 'completed']); 
                    $table->decimal('total_amount', 10, 2)->nullable(); 
                    $table->timestamps();
                });
            }
        }
        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
