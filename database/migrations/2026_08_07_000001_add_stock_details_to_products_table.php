<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('products', 'stock_details')) {
            Schema::table('products', function (Blueprint $table) {
                $table->json('stock_details')->nullable()->after('qty');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'stock_details')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('stock_details');
            });
        }
    }
};
