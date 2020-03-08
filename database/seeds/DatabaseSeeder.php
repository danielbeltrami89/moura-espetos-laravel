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
        DB::table('setores')->insert([
            'nome' => 'Administração',
            'descricao' => ""
        ]);

        DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('Labo2020'),
            'setor_id' => 1,
            'cpf' => '',
            'funcao' => 'Coordenador',
            'encarregado' => '',
        ]);

        DB::table('status')->insert([
            'nome' => "Diponível"
        ]);
        DB::table('status')->insert([
            'nome' => "Em uso"
        ]); 
        DB::table('status')->insert([
            'nome' => "Em manutenção"
        ]);

        DB::table('tipo')->insert([
            'nome' => "Escritório"
        ]);
    }
}
