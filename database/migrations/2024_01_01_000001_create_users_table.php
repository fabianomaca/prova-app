<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Cria um BIGINT UNSIGNED como chave primária
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->unsignedBigInteger('permission_group_id'); // Chave estrangeira para groups

            // Relacionamento com a tabela groups
            $table->foreign('permission_group_id')
                ->references('id')
                ->on('groups'); // Cascateia a exclusão

            $table->timestamps();
            $table->charset = 'latin1';
            $table->collation = 'latin1_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}