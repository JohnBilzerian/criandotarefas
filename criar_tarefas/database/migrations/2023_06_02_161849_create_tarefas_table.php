<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('tarefa_titulo');
            $table->string('tarefa_descricao');
            $table->enum('tarefa_status',['Concluido','Nao Concluido']);
            $table->date('tarefa_data');
            $table->enum('tarefa_prioridade',['Alta','Media','Baixa']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
