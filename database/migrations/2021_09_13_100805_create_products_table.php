<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->integer('number');
            $table->boolean('active',['1','2']);
            $table->string('image', 200);
            $table->enum('categoria', ['Banho', 'Eletro', 'Limpeza']);
            $table->text('desc');
            $table->timestamps();
        });
    }

    // Após criar o banco de dados o arquivo composer irá salvar toda a estrutar deste banco de dados, caso queira alterar o nome do banco de dados será preciso atualizar o registro do aquivo composer para que não haja incompatbilidade, acessando o terminal e digitando "composer dumb-autoload"

    //Mais informações acessar a aula 12 migrations nos últimos minutos da aula.

    // Depois de atualizar corretamente basta criar a tabela digitando "php artisan migrate".

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}