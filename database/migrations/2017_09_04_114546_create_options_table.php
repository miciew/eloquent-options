<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = $this->getTableName();

        Schema::create($tableName, function (Blueprint $table)
        {
            $table->increments('id');

            $table->morphs('optionable');

            $table->string('name');
            $table->text('value')->nullable();

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
        $tableName = $this->getTableName();

        Schema::dropIfExists($tableName);
    }

    protected function getTableName()
    {
        return config('eloquent-options.table_name');
    }
}
