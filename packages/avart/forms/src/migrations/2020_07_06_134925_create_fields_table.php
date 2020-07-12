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
            $table->string('description')->nullable();
            $table->string('route')->nullable();
            $table->string('model')->nullable();
            $table->boolean('create_model')->default(1);
            $table->boolean('create_migration')->default(1);
            $table->boolean('create_controller')->default(1);
            $table->boolean('create_views')->default(1);
            $table->boolean('create_permissions')->default(0);
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
            $table->unsignedBigInteger('table_id')->nullable();
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedSmallInteger('length')->nullable();
            $table->string('name');
            $table->string('title');
            $table->boolean('nullable')->default(1);
            $table->string('default')->nullable();
            $table->boolean('fillable')->default(1);
            $table->boolean('inlist')->default(1);
            $table->json('settings')->nullable();
            $table->timestamps();

            $table->foreign('table_id')
                ->references('id')->on('tables')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade');
        });

        Schema::create('table_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->string('name');
            $table->string('uri')->nullable();
            $table->timestamps();

            $table->foreign('table_id')
                ->references('id')->on('tables')
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
