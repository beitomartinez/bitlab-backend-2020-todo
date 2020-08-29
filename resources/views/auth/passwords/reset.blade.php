@extends('layouts.main')

@section('content')
<h1 class="font-bold text-4xl">Restablecer contraseña</h1>

<form method="POST" action="{{ route('password.update') }}" class="max-w-sm">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">

  <div class="mb-2">
    <p class="mb-1"><label for="email" class="form-label">Correo electrónico</label></p>
    <input type="text" class="form-input" name="email" id="email" value="{{ old('email') }}" required>
    @error('email')
      <strong>{{ $message }}</strong>
    @enderror
  </div>

  <div class="mb-2">
    <p class="mb-1"><label for="password" class="form-label">Contraseña</label></p>
    <input type="password" class="form-input" name="password" id="password" required>
    @error('password')
      <strong>{{ $message }}</strong>
    @enderror
  </div>
  <div class="mb-2">
    <p class="mb-1"><label for="password_confirmation" class="form-label">Confirmar contraseña</label></p>
    <input type="password" class="form-input" name="password_confirmation" id="password_confirmation" required>
    @error('password_confirmation')
      <strong>{{ $message }}</strong>
    @enderror
  </div>
  
  <div class="text-center mt-4">@include('partials.ui.button', ['label' => 'Restablercer', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>
</form>
@endsection