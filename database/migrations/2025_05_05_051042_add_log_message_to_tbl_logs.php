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
        Schema::table('tbl_logs', function (Blueprint $table) {
            $table->string('log_message')->nullable(); // Add the log_message column
        });
    }
    
    public function down()
    {
        Schema::table('tbl_logs', function (Blueprint $table) {
            $table->dropColumn('log_message'); // Drop the column in case of rollback
        });
    }
    
};
