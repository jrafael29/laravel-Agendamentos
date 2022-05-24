<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Service;

class SiteController extends Controller
{
    public function index()
    {
        $servicos = Service::all();
        return view('site.index', [
            'servicos' => $servicos
        ]);
    }

    
}
