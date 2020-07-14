@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Página de inicio</h1>
<p>Esta es una aplicación web para llevar el control de mis tareas por hacer</p>
<p class="mb-4">@include('partials.ui.button', ['label' => 'Ver listado de categorías', 'url' => route('categories.index')])</p>

@include('partials.tasks.pending', ['message' => 'No olvides, que tienes estas tareas pendientes:'])
@endsection

@section('scripts')
{{-- <script src="{{ asset('js/say-hi.js') }}"></script> --}}
@endsection