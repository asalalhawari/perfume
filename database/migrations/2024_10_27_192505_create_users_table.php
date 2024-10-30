<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Check if the table already exists
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('phone_number')->nullable(); // Make phone number nullable
                $table->string('role')->default('user'); // Default role
                $table->rememberToken(); // Token for "remember me" functionality
                $table->boolean('email_verified')->default(false); // Email verification status
                $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
