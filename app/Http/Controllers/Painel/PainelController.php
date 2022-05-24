<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countServices = count(Service::all());
        $countUsers = count(User::all());
        $countEvents = count(Evento::all());


        return view('painel.index', [
            'countServices' => $countServices,
            'countUsers' => $countUsers,
            'countEvents' => $countEvents
        ]);
    }
}
