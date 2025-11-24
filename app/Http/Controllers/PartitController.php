<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitController extends Controller
{
    // Dades per defecte (fallback si la sessió està buida)
    public $partits = [
        [
            'local'    => 'Barça Femení',
            'visitant' => 'Atlètic de Madrid',
            'data'     => '2024-11-30',
            'resultat' => '', // buit → partit pendent
        ],
        [
            'local'    => 'Real Madrid Femení',
            'visitant' => 'Barça Femení',
            'data'     => '2024-12-15',
            'resultat' => '0-3',
        ],
    ];

    public function index()
    {
        $partits = Session::get('partits', $this->partits);
        return view('partits.index', compact('partits'));
    }

    public function show(int $id)
    {
        $partits = Session::get('partits', $this->partits);
        abort_if(!isset($partits[$id]), 404, 'Partit no trobat');
        $partit = $partits[$id];
        return view('partits.show', compact('partit'));
    }

    public function create()
    {
        // Opcional: obtenir equips de la sessió per omplir un select
        $equips = Session::get('equips', [
            ['nom' => 'Barça Femení'],
            ['nom' => 'Atlètic de Madrid'],
            ['nom' => 'Real Madrid Femení'],
        ]);
        $equipNames = array_column($equips, 'nom');
        return view('partits.create', compact('equipNames'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'local'    => 'required|min:2',
            'visitant' => 'required|min:2|different:local',
            'data'     => 'required|date|after_or_equal:today',
            'resultat' => 'nullable|string|regex:/^\d+-\d+$/',
        ], [
            'visitant.different' => 'L’equip visitant ha de ser diferent de l’equip local.',
            'data.after_or_equal' => 'La data ha de ser avui o posterior.',
            'resultat.regex' => 'El resultat ha de tenir el format "X-Y" (ex: 2-1). Deixa buit si encara no s’ha jugat.',
        ]);

        // Si el resultat està buit, ho desem com a cadena buida
        $validated['resultat'] = trim($validated['resultat'] ?? '');

        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()->route('partits.index')
                         ->with('success', 'Partit afegit correctament!');
    }
}