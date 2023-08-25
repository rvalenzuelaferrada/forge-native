<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Laravel\Forge\Forge;

class SiteController extends Controller
{
    private Forge $forge;

    public Collection $servers;

    public function __construct()
    {
        $this->forge = new Forge(config('services.forge.api_token'));
    }

    public function index()
    {
        if (!config('services.forge.api_token')) {
            return Inertia::render('SetApiToken');
        }

        try {
            $servers = collect($this->forge->servers())->map(function ($server) {
                $server->sites = $this->forge->sites($server->id);
                return $server;
            });
        } catch(Exception $e) {
            return $e->getMessage();
        }

        return Inertia::render('Site/Index', [
            'servers' => $servers,
        ]);
    }
}
