<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToProprietairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proprietaires', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('profession')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->integer('telephone')->nullable();
            $table->string('carte_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proprietaires', function (Blueprint $table) {
            $table->dropColumn(['photo', 'bio', 'profession', 'adresse', 'pays', 'telephone', 'carte_id']);
        });
    }
}
