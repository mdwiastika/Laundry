<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `delete_transaksi`');
        $stored_procedure = "CREATE PROCEDURE `delete_transaksi` (IN get_id_transaksi INT(10))
        BEGIN
        DELETE FROM transaksis WHERE id = get_id_transaksi;
        DELETE FROM detail_transaksis WHERE id_transaksi = get_id_transaksi;
        END;";
        DB::unprepared($stored_procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
