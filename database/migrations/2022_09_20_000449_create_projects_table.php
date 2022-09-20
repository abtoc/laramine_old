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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('identifer')->unique();
            $table->unsignedTinyInteger('status')->default(1);
            $table->boolean('inherit_members')->default(false);
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('_lft')->nullable()->index();
            $table->unsignedInteger('_rgt')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
