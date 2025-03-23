<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('grades', function (Blueprint $table) {
        if (!Schema::hasColumn('grades', 'user_id')) { 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        }
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            //
        });
    }
};
