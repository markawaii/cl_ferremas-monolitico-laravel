<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::create(['name' => 'super administrador']);
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'moderador']);
        Role::create(['name' => 'invitado']);
        Role::create(['name' => 'cajero']);
    }
}
