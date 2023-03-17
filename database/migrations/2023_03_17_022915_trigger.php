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
        DB::unprepared('DROP TRIGGER IF EXISTS `add_pajak`');
        $trigger_code = "CREATE TRIGGER add_pajak
        AFTER INSERT ON detail_transaksis
        FOR EACH ROW BEGIN
        DECLARE set_biaya_tambahan INT;
        DECLARE is_member VARCHAR(20);
        SELECT biaya_tambahan INTO set_biaya_tambahan FROM transaksis WHERE id = NEW.id_transaksi LIMIT 1;
        IF set_biaya_tambahan <= 10000 THEN
        UPDATE transaksis SET pajak = 0 WHERE id = NEW.id_transaksi;
        ELSEIF set_biaya_tambahan <= 25000 THEN
        UPDATE transaksis SET pajak = 4 WHERE id = NEW.id_transaksi;
        ELSEIF set_biaya_tambahan >= 25000 THEN
        UPDATE transaksis SET pajak = 2 WHERE id = NEW.id_transaksi;
        ELSE
        UPDATE transaksis SET pajak = 0 WHERE id = NEW.id_transaksi;
        END iF;
        END;";
        DB::unprepared($trigger_code);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
