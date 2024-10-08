<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('category_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // This should be present
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_activities');
    }
}

