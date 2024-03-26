<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario')->nullable(); ;
            $table->string('password')->nullable();
            $table->integer('rol')->nullable();

            $table->datetime('fecha_registro')->nullable();
            $table->string('usuario_registro', 50)->nullable();
            $table->boolean('eliminado')->nullable();
            $table->string('usuario_eliminado', 50)->nullable();
            $table->datetime('fecha_modifica')->nullable();
            $table->string('usuario_modifica', 50)->nullable();

            $table->unsignedInteger('id_perfil')->nullable();
            $table->foreign('id_perfil')->references('id_perfil')->on('perfiles')->onDelete('cascade');

            $table->timestamps();
        });

        // Lógica para agregar el usuario administrador
        $admin = new User([
            'usuario' => 'Administrador',
            'password' => Hash::make('User01admin'),
            'rol' => 1,
            'fecha_registro' => now(),
            'usuario_registro' => 'admin',
        ]);
        $admin->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
