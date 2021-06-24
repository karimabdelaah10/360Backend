<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComponentFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_fields', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('order');
            $table->string('value');
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id','componentFieldsCons')->references('id')->on('components')->constrained()->onDelete('cascade');;
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
        Schema::dropIfExists('component_fields');

    }
}
