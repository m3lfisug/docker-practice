<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            // tableのカラム
            $table->bigIncrements('id');
            $table->string('name')->comment('名前');
            $table->integer('age')->nullable()->comment('年齢');
            
            $table->timestamps();
            // $table->timestamp('created_at')
            // $table->timestamp('update_at')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
