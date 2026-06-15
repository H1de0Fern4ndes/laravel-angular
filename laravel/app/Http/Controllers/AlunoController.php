<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{

    function add(Request $dados) { 
        $validator = Validator::make(
		$dados->all(),['nome' => 'required|min:3|max:255'],
        [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
        ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('aluno.index')
                ->withErrors($validator)
                ->withInput();
        }

        $aluno = new \App\Models\AlunoModel();
        $aluno::create($dados->all());

        $alunos = new \App\Models\AlunoModel();

        return response()->json($alunos->all(), 200);
    }
}
