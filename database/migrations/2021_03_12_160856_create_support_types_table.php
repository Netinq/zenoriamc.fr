<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTypesTable extends Migration
{
    public function up()
    {
        Schema::create('support_types', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('title');
            $table->string('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('support_types');
    }
}
