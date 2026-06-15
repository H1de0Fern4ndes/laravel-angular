<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    function add(Request $dados) { 
        $validator = Validator::make(
        $dados->all(),['nome' => 'required|min:3|max:255',
        'periodo' => 'required|regex:/^(Manhã|Tarde|Noite)$/'
        ],
        [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
        'periodo.required' => 'O campo periodo é obrigatório.',
        'periodo.regex' => 'O campo periodo deve conter um valor válido (Manhã, Tarde ou Noite).',
        ]
        );
        
        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());

        $cursos = new \App\Models\CursoModel();

        return response()->json($cursos->all(), 200);
    }
}
