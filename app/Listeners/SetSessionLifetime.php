<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class SetSessionLifetime
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Modifica el tiempo de vida de la sesión aquí
        if (config('app.env') === 'local') {
            Session::save(); // Guarda la sesión antes de modificar el tiempo de vida
            config(['session.lifetime' => 604800]); // 1 semana
            Session::save();
        }
    }
}
