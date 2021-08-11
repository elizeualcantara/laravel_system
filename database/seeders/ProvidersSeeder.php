<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            'name' => 'Teste',
            'email' => 'admin@admin.com',
            'telefone' => '41 33445566',
            'cpf_cnpj' => '12345678909',
        ]);
    }
}