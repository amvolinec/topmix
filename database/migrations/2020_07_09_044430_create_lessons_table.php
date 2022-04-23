<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('description')->default('');
            $table->text('text')->nullable();
            $table->string('file')->nullable();
            $table->string('notes')->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->boolean('published')->default(0);
            $table->decimal('price', 8,2)->default(0);
            $table->timestamps();

            $table->foreign('course_id')->references('id')
                ->on('courses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
