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
        Schema::create('posts_cms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users_cms');
         
            $table->string('title', 150)->nullable();
            $table->text('content_text')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
          
            $table->text('featured_image')->nullable();
        
           $table->dateTime('created_at')->nullable()->default(null);
           $table->dateTime('updated_at')->useCurrent();
    });

    DB::statement("ALTER TABLE posts_cms ADD CONSTRAINT status_constraint CHECK (status IN (0, 1, 2))");
   
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_cms');
    }
};
