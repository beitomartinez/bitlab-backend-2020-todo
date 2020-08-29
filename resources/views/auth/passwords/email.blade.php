@extends('layouts.main')

@section('content')
<h1 class="font-bold text-4xl">Restablecer contraseña</h1>

<form method="POST" action="{{ route('password.email') }}" class="max-w-sm">
  @csrf

  <div class="mb-2">
    <p class="mb-1"><label for="email" class="form-label">Correo electrónico</label></p>
    <input type="text" class="form-input" name="email" id="email" value="{{ old('email') }}" required>
    @error('email')
      <strong>{{ $message }}</strong>
    @enderror
  </div>

  <div class="text-center mt-4">@include('partials.ui.button', ['label' => 'Enviarme el enlace', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>
</form>

@endsection
