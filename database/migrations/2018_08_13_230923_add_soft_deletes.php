<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes();
        });
        
        Schema::table('tags', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('posts', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        }
        
        if (Schema::hasColumn('posts', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('created_at');
            });
        }
        
        if (Schema::hasColumn('posts', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('updated_at');
            });
        }
    }
}
