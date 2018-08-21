<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryAndFeaturedPostColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('posts', 'featured_sort')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->integer('featured_sort')->nullable()->after('body');
            });
        }
        
        if (!Schema::hasTable('category_post')) {
            Schema::create('category_post', function (Blueprint $table) {
                $table->integer('post_id')->unsigned();
                $table->integer('category_id')->unsigned();
                $table->index(['post_id', 'category_id']);
            });
        }

        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('categories');
        if (Schema::hasColumn('posts', 'featured_sort')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('featured_sort');
            });
        }
    }
}
