@extends('layouts.app')
@section('titulo', 'Entrar')
@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h4 mb-4">Entrar</h1>
                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            required autofocus>
                        {{-- O Fortify devolve o erro de credenciais no campo email --}}
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" name="password"
                            class="form-control" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" id="remember" name="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Manter conectado</label>

                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                <p class="text-center mt-3 mb-0">
                    Não tem conta? <a href="{{ url('/register') }}">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection