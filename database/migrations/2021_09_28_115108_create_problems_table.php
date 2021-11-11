<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug')->nullable()->uniqid();
            $table->string('case_number', '100');
            $table->bigInteger('category_id');
            $table->text('allegation');
            $table->string('decision_date', '50');
            $table->longText('case_summary');
            $table->longText('decision');
            $table->text('instance');
            $table->mediumText('conclusion');
            $table->mediumText('related_case');
            $table->text('document_name');
            $table->text('document_link');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('problems');
    }
}
