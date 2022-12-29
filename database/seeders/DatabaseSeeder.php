<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Empleado;
use App\Models\Rol;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $puestolaboral = new Puestolaboral;
        $puestolaboral->nombre = 'Administrador RRHH';
        $puestolaboral->descripcion = 'Los encargados de este puesto laboral se en cargaran de adminitrar la aplicacion web';
        $puestolaboral->espacios = '5';
        $puestolaboral->save();

        $usuariomovil = new Usuariomovil;
        $usuariomovil->usuario = 'jgomez@gmail.com';
        $usuariomovil->contrasena = bcrypt('password');
        $usuariomovil->save();

        $empleado = new Empleado;
        $empleado->puestolaboral_id = '1';
        $empleado->usuariomovil_id = '1';
        $empleado->nombre = 'JUAN GOMEZ';
        $empleado->ci='12345678';
        $empleado->fnacimiento='2000-01-01';
        $empleado->sexo='M';
        $empleado->direccion='Avenida Santos Dumont';
        $empleado->save();

        $rol = new Rol;
        $rol->nombre = 'Administrador';
        $rol->descripcion = 'Tiene todos los permisos del sistema';
        $rol->save();
        
        $user = new User;
        $user->empleado_id='1';
        $user->rol_id='1';
        $user->email='admin@mail.com';
        $user->password=bcrypt('password');
        $user->save();

    }
}
