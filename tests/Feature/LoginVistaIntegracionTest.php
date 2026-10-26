<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginVistaIntegracionTest extends TestCase
{
    public function test_la_vista_de_inicio_de_sesion_muestra_sus_campos(): void
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('action="'.route('login').'"', false)
            ->assertSee('name="nombre_usuario"', false)
            ->assertSee('name="password"', false)
            ->assertSee('name="remember"', false);
    }
}
