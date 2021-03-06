<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameColumsReligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('religions', function (Blueprint $table) {
            $table->renameColumn('isActive','is_active');
            $table->renameColumn('createdBy','created_by');
            $table->renameColumn('modifiedBy','modified_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('religions', function (Blueprint $table) {
            //
        });
    }
}
