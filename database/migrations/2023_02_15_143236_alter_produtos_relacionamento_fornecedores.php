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


        Schema::table('produtos', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId(
                array(
                    'nome' => 'Fornecedor padrão',
                    'site' => 'fornecedorpadrao.com.br',
                    'uf' => 'RJ',
                    'email' => 'fornecedorpadrao@sg.com.br',
                )
            );
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produtos', function (Blueprint $table) {

            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropcolumn('fornecedor_id');
        });
    }
};