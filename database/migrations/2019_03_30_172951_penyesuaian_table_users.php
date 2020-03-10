<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('nik')->unique();
            $table->text('address');
            $table->string('phone');
            $table->string('roles');
            $table->integer('candidate_id')->unsigned()->nullable();
            $table->enum('status',['BELUM','SUDAH']);

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('nik');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('roles');
            $table->dropColumn('candidate_id');
            $table->dropColumn('status');
        });
    }
}
