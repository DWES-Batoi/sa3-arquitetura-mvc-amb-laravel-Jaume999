<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JugadoraController extends Controller
{
    // Datos por defecto (fallback si la sessió està buida)
    public $jugadores = [
        ['nom' => 'Alexia Putellas',       'equip' => 'Barça Femení',       'posicio' => 'Migcampista'],
        ['nom' => 'Esther González',       'equip' => 'Atlètic de Madrid',  'posicio' => 'Davantera'],
        ['nom' => 'Misa Rodríguez',        'equip' => 'Real Madrid Femení', 'posicio' => 'Portera'],
    ];

    public function index()
    {
        $jugadores = Session::get('jugadores', $this->jugadores);
        return view('jugadores.index', compact('jugadores'));
    }

    public function show(int $id)
    {
        $jugadores = Session::get('jugadores', $this->jugadores);
        abort_if(!isset($jugadores[$id]), 404, 'Jugadora no trobada');
        $jugadora = $jugadores[$id];
        return view('jugadores.show', compact('jugadora'));
    }

    public function create()
    {
        // Opcional: pasar llista d'equips per select si vols
        $equips = Session::get('equips', [
            ['nom' => 'Barça Femení'],
            ['nom' => 'Atlètic de Madrid'],
            ['nom' => 'Real Madrid Femení'],
        ]);
        $equipNames = array_column($equips, 'nom');
        return view('jugadores.create', compact('equipNames'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'     => 'required|min:3',
            'equip'   => 'required|min:2',
            'posicio' => 'required|min:3',
        ]);

        $jugadores = Session::get('jugadores', $this->jugadores);
        $jugadores[] = $validated;
        Session::put('jugadores', $jugadores);

        return redirect()->route('jugadores.index')
                         ->with('success', 'Jugadora afegida correctament!');
    }
}