<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class')->nullable();
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('type_id');
            $table->string('title');
            $table->string('description');
            $table->string('route');
            $table->string('model');
            $table->json('settings');
            $table->timestamps();

            $table->foreign('table_id')
                ->references('id')->on('tables')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
        Schema::dropIfExists('types');
        Schema::dropIfExists('tables');
    }
}
