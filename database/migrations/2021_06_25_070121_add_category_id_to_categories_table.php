<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            Schema::table('categories', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable()->after('slug');

                $table->foreign('category_id')->references('id')->on('categories');
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
        if (Schema::hasColumn('categories', 'category_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('category_id');
                $table->dropForeign(['category_id']);
            });
        }
    }
}
