<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddProprietaireIdToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Ajouter la colonne sans la contrainte NOT NULL
            $table->unsignedBigInteger('proprietaire_id')->nullable()->after('id');

            // Ajouter la clé étrangère
            $table->foreign('proprietaire_id')->references('id')->on('proprietaires')->onDelete('cascade');
        });

        // Mettre à jour les enregistrements existants avec une valeur par défaut
        DB::table('reservations')->update(['proprietaire_id' => 1]); // Par exemple, 1 comme valeur par défaut
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['proprietaire_id']);
            $table->dropColumn('proprietaire_id');
        });
    }
}