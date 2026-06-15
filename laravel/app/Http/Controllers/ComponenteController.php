<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponenteController extends Controller
{

    function add(Request $dados) { 
        $validator = Validator::make(
        $dados->all(),['nome' => 'required|min:3|max:255',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fim' => 'required|date_format:H:i|after:hora_inicio'
        ],
        [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
        'hora_inicio.required' => 'O campo hora de início é obrigatório.',
        'hora_inicio.date_format' => 'O campo hora de início deve estar no formato HH:MM.',
        'hora_fim.required' => 'O campo hora de fim é obrigatório.',
        'hora_fim.date_format' => 'O campo hora de fim deve estar no formato HH:MM.',
        'hora_fim.after' => 'O campo hora de fim deve ser posterior à hora de início.'
        ]
        );
        
        $componente = new \App\Models\ComponenteModel();
        $componente::create($dados->all());

        $componentes = new \App\Models\ComponenteModel();

        return response()->json($componentes->all(), 200);
    }
}
