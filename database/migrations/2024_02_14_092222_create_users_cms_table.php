<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_cms', function (Blueprint $table) {
            $table->id();
        
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable()->index()->unique();
           
            $table->text('password')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->string('role_code',100)->default('admin');  
            $table->string('forgot_key', 150)->nullable();
         
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->useCurrent();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE users_cms ADD CONSTRAINT status_constraint CHECK (status IN (0, 1, 2))");
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_cms');
    }
};

