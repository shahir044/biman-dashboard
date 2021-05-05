<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            Schema::table('posts', function (Blueprint $table) {
                $table->string('name');
                $table->string('department');
                $table->string('building');
                $table->string('problem');
                $table->integer('extension_no');
                $table->integer('mobile')->nullable();
                $table->integer('assigned_person')->nullable();
                $table->integer('assigned_by')->nullable();
                
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('department');
            $table->dropColumn('building');
            $table->dropColumn('problem');
            $table->dropColumn('extension_no');
            $table->dropColumn('mobile');
            $table->dropColumn('assigned_person');
            $table->dropColumn('assigned_by');
            
        });
    }
}
