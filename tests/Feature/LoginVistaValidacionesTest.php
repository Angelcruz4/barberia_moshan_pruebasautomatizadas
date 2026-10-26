<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginVistaValidacionesTest extends TestCase
{
    public function test_el_usuario_es_obligatorio(): void
    {
        $this->from('/login')
            ->post('/login', [
                'password' => 'clave-de-prueba',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('nombre_usuario');
    }

    public function test_la_contrasena_es_obligatoria(): void
    {
        $this->from('/login')
            ->post('/login', [
                'nombre_usuario' => 'usuario-de-prueba',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('password');
    }

    public function test_usuario_y_contrasena_deben_ser_texto(): void
    {
        $this->from('/login')
            ->post('/login', [
                'nombre_usuario' => ['usuario-de-prueba'],
                'password' => ['clave-de-prueba'],
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors(['nombre_usuario', 'password']);
    }
}
