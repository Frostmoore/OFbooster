@extends('layouts.app')

@section('title', 'Accesso')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h1 class="h4 fw-bold mb-2">Area riservata</h1>
        <p class="text-muted mb-4">Inserisci la password per vedere le richieste del form.</p>

        @if($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('admin.contatti.doLogin') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label fw-semibold" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required autofocus>
          </div>
          <button class="btn btn-danger w-100" type="submit">
            <i class="fa-solid fa-lock me-2"></i>Entra
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
