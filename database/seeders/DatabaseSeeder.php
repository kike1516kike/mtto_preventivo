<?php
namespace Database\Seeders;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([ // Ajusta esto según tus necesidades
            'usuario' => 'Administrador',
            'password' => Hash::make('User01admin'),
            'rol' => 1,
            'fecha_registro' => now(),
            'usuario_registro' => 'admin',
            'eliminado' => false,
            'usuario_eliminado' => null,
            'fecha_modifica' => now(),
            'usuario_modifica' => 'admin',
        ]);
    }
}
