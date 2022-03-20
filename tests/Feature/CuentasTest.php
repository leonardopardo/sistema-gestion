<?php

namespace Tests\Feature;

use App\Models\Cuenta;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CuentasTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    /** @test */
    public function crear_nueva_cuenta_como_usuario_administrador()
    {
        $userAdmin = factory(User::class)
            ->create();

        $userAdmin
            ->assignRole(Role::create(['name' => 'SuperAdmin']));

        $this
            ->withoutExceptionHandling()
            ->actingAs($userAdmin)
            ->post('/cuentas', [
                'razon_social' => 'Leonardo Pardo',
                'documento' => '20289867366',
            ])
            ->assertStatus(302);
    }
}

