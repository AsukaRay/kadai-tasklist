<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToTasklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasklists', function (Blueprint $table) {
            $table->string('status');
        });
    }


    public function down()
    {
        Schema::table('tasklists', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
