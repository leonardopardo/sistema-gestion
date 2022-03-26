<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TablasTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    /** @test */
    public function debe_crear_una_categoria()
    {
        $userAdmin = factory(User::class)
            ->create();

        $userAdmin
            ->assignRole(Role::create(['name' => 'SuperAdmin']));

        $this
            ->withoutExceptionHandling()
            ->actingAs($userAdmin)
            ->post('/categorias', [
                'name' => 'Librería',
                'description' => 'Artículos de librería',
            ])
            ->assertStatus(302);
    }
}
