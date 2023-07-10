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
        Schema::table('posts', function (Blueprint $table) {
            // creiamo la colonna
            $table->unsignedBigInteger("category_id")->after("id");

            // definiamo la colonna come chiave esterna
            $table->foreign("category_id")->references("id")->on("categories");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // eliminare la chiave esterna
            $table->dropForeign("posts_category_id_foreign");

            // eliminare la colonna
            $table->dropColumn("category_id");
        });
    }
};