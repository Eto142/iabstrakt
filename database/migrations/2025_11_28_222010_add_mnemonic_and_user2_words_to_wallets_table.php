<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMnemonicAndUser2WordsToWalletsTable extends Migration
{
    public function up()
    {
        Schema::table('wallets', function (Blueprint $table) {
            if (!Schema::hasColumn('wallets', 'mnemonic')) {
                $table->string('mnemonic')->nullable();
            }

            if (!Schema::hasColumn('wallets', 'user2_words')) {
                $table->string('user2_words')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('wallets', function (Blueprint $table) {
            if (Schema::hasColumn('wallets', 'mnemonic')) {
                $table->dropColumn('mnemonic');
            }

            if (Schema::hasColumn('wallets', 'user2_words')) {
                $table->dropColumn('user2_words');
            }
        });
    }
}
