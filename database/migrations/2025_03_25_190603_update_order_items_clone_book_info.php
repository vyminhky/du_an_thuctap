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
        //
        Schema::table('order_items', function (Blueprint $table) {
            $table->string('book_title')->after('book_id');
            $table->string('book_author')->after('book_title');
            $table->string('book_image')->nullable()->after('book_author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
