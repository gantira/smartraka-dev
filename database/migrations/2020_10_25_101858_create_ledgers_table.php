<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id');
            $table->foreignId('company_id');
            $table->foreignId('account_id');
            $table->foreignId('parent_id');
            $table->string('description');
            $table->double('debit');
            $table->double('credit');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
