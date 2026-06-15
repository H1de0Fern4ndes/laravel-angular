<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function add(Request $dados) { 
        $validator = Validator::make(
		$dados->all(),['nome' => 'required|min:3|max:255', 
        'email' => 'required|email|max:255', 
        'telefone' => 'required|regex:/^\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$/'
        ],
        [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'O campo email deve conter um endereço de email válido.',
        'email.max' => 'O campo email deve conter no máximo 255 caracteres.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'telefone.regex' => 'O campo telefone deve conter um número de telefone válido.',
        ]
        );
        if ($validator->fails()) {
            return redirect()
                ->route('aluno.index')
                ->withErrors($validator)
                ->withInput();
        };
        $professor = new \App\Models\ProfessorModel();
        $professor::create($dados->all());

        $professores = new \App\Models\ProfessorModel();
        return response()->json($professores->all(), 200);
    }
}