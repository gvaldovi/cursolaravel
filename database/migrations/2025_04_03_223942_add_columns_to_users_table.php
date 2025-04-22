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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name');
            $table->string('phone')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('users')){
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumns('users', ['lastname', 'phone'])) {
                    $table->dropColumn(['lastname', 'phone']);
                }                
                //$table->dropColumn('phone');
            });    
        }
        
    }
};
