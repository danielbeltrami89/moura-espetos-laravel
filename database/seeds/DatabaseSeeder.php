<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('Espeto2020'),
            'cpf' => '',
            'telefone' => '00000000000',
            'tipo' => 'ADM'
        ]);

        DB::table('itens')->insert([
            'nome' => 'Frango',
            'descricao' => 'Feita em casa',
            'valor' => '18,00',
            'tipo' => 'MARMITA'
        ]);

    }
}
