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
            'endereco' => 'Rua Central, 56, Centro, São Paulo - SP',
            'password' => bcrypt('Espeto2020'),
            'cpf' => '',
            'telefone' => '00000000000',
            'tipo' => 'ADM'
        ]);

        DB::table('itens')->insert([
            'nome' => 'Frango',
            'descricao' => 'Feita em casa',
            'valor' => 18,
            'tipo' => 'MARMITA'
        ]);

    }
}
