<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    const DataSeedEnv = 'ZEROPS_RECIPE_DATA_SEED';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $seed = json_decode(env(self::DataSeedEnv, '[]'));

        foreach ($seed as $s) {
            DB::table('todos')->insert([
                'text' => $s,
                'completed' => false
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $seed = json_decode(env(self::DataSeedEnv, '[]'));

        foreach ($seed as $s) {
            DB::table('todos')->where('text', '=', $s)->delete();
        }
    }
};
