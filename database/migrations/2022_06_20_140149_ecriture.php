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
        Schema::create('ecritures', function (Blueprint $table) {
            $table->string("uuid", 36);
            $table->string("compte_uuid", 36);
            $table->string('label', 255)->default('');
            $table->date('date')->nullable();
            $table->enum('type', ['C', 'D']);
            $table->double('amount', 14, 2)->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->primary(['uuid', 'compte_uuid']);

            $table
                ->foreign('compte_uuid')
                ->references('uuid')
                ->on('dossier')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
