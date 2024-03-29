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
        Schema::enableForeignKeyConstraints();
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text');
<<<<<<< HEAD
            $table->boolean('is_active')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->foreignId('type_id')->unsigned()->constrained('types');
=======
            $table->boolean('is_active')->default(1);
            $table->string('format');
>>>>>>> 3435db419e1b57988185f5d2060c78375189396d
            $table->foreignId('category_id')->unsigned()->constrained('categories');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
