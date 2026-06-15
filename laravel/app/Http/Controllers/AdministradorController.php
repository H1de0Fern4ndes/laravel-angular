<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Administradorontroller extends Controller
{

    function add(Request $dados) { 
        // 'nome', 'email', 'telefone', 'cpf', 'usuario', 'senha', 'status'
        $validator = Validator::make(
        $dados->all(),['nome' => 'required|min:3|max:255',
        'email' => 'required|email|max:255',
        'telefone' => 'required|regex:/^\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$/',
        'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
        'usuario' => 'required|min:5|max:255|unique:administradores,usuario',
        'senha' => 'required|min:8|confirmed',
        'status' => 'required|in:ativo,inativo'
        ],
        [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'O campo email deve ser um endereço de email válido.',
        'email.max' => 'O campo email deve conter no máximo 255 caracteres.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'telefone.regex' => 'O campo telefone deve estar no formato (XX) XXXXX-XXXX.',
        'cpf.required' => 'O campo CPF é obrigatório.',
        'cpf.regex' => 'O campo CPF deve estar no formato XXX.XXX.XXX-XX.',
        'usuario.required' => 'O campo usuário é obrigatório.',
        'usuario.min' => 'O campo usuário deve conter no mínimo 5 caracteres.',
        'usuario.max' => 'O campo usuário deve conter no máximo 255 caracteres.',
        'usuario.unique' => 'O campo usuário já está em uso.',
        'senha.required' => 'O campo senha é obrigatório.',
        'senha.min' => 'O campo senha deve conter no mínimo 8 caracteres.',
        'senha.confirmed' => 'O campo senha de confirmação deve corresponder ao campo senha.',
        'status.required' => 'O campo status é obrigatório.',
        'status.in' => 'O campo status deve conter um valor válido (ativo ou inativo).',

        ]
        );
        
        $administrador = new \App\Models\AdministradorModel();
        $administrador::create($dados->all());

        $administradores = new \App\Models\AdministradorModel();

        return response()->json($administradores->all(), 200);
    }
}
