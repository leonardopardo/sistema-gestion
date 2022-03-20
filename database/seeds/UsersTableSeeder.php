<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole->save();

        $u = new User;
        $u->name = 'jg.pradi';
        $u->email = 'jg.pradi@gmail.com';
        $u->password = Hash::make('jjkkll') ;
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'lucas';
        $u->email = 'lucas@mail.com';
        $u->password = Hash::make('123123');
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'leonardo';
        $u->email = 'leonardo@mail.com';
        $u->password = Hash::make('123123');
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'jorge';
        $u->email = 'jrc@rednet.com';
        $u->password = Hash::make('123123');
        $u->save();
        $u->assignRole($adminRole);

        $u = new User;
        $u->name = 'cliente';
        $u->email = 'cliente@mail.com';
        $u->password = Hash::make('123123');
        $u->save();
    }
}
