<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
        { 
            Schema::create('accounts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id'); 
                $table->string('ref_id')->unique();
                $table->float('amount'); 
                $table->enum('type', ['credit', 'debit']);
                $table->string('description');
                $table->dateTime('selected_date'); 
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
            });
        } 

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('accounts', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
            Schema::dropIfExists('accounts');
        }
};
