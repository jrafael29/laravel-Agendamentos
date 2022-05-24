<?php

namespace App\Http\Controllers\Painel\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login()
    {
        return view('painel.auth.login');
    }
    public function loginAttempt(Request $request)
    {
        $dados = $request->only('email', 'password');

        $validar = $this->validarLogin($dados);

        if($validar->fails()){
            return redirect()
                ->route('login')
                ->withErrors($validar)
                ->withInput();
        }

        if(Auth::attempt($dados)){
            return redirect()
                ->route('painelIndex');
        }else{
            $validar->errors()->add('password', 'Email e/ou senha errados');
            return redirect()
                ->route('login')
                ->withErrors($validar)
                ->withInput();
        }

    }

    public function registro()
    {
        return view('painel.auth.registro');
    }

    public function registroAttempt(Request $request)
    {
        $dados = $request->only('nome', 'email', 'password', 'password_confirmation');

        $validar = $this->validarRegistro($dados);

        if($validar->fails()){
            return redirect()
                ->route('registro')
                ->withErrors($validar)
                ->withInput();
        }

        $usuario = $this->create($dados);
        Auth::login($usuario);
        return redirect()->route('painelIndex');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('painelIndex');
    }


    
    protected function create(array $dados)
    {
        return User::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']) 
        ]);
    }
    protected function validarRegistro(array $dados)
    {
        return Validator::make($dados, [
            'nome' => ['string', 'max:50'],
            'email' => ['string', 'email', 'max:100'],
            'password' => ['string', 'min:4' ,'max:100', 'confirmed']
        ]);
    }
    protected function validarLogin(array $dados)
    {
        return Validator::make($dados, [
            'email' => ['string', 'email', 'max:100'],
            'password' => ['string', 'min:4' ,'max:100']
        ]);
    }

}
