<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodeMXESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_code_m_x_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('d_codigo');
            $table->string('d_asenta');
            $table->string('d_tipo_asenta');
            $table->string('d_mnpio');
            $table->string('d_estado');
            $table->string('d_ciudad');
            $table->string('d_cp');
            $table->string('c_estado');
            $table->string('c_oficina');
            $table->string('c_cp');
            $table->string('c_tipo_asenta');
            $table->string('c_mnpio');
            $table->string('id_asenta_cpcons');
            $table->string('d_zona');
            $table->string('c_cve_ciudad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_code_m_x_e_s');
    }
}
