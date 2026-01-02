@extends('layouts.app')

@section('title', 'Richieste Form')

@section('content')
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
  <div>
    <h1 class="h3 fw-bold mb-1">Richieste contatti</h1>
    <div class="text-muted">Tutte le compilazioni del form (con esito invio email).</div>
  </div>

  <form class="d-flex gap-2" method="GET" action="{{ route('admin.contatti.index') }}">
    <input class="form-control" style="min-width:260px" type="text" name="q" value="{{ $q }}" placeholder="Cerca nome, email, testo...">
    <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>

  <form method="POST" action="{{ route('admin.contatti.logout') }}">
    @csrf
    <button class="btn btn-outline-danger" type="submit">
      <i class="fa-solid fa-right-from-bracket me-2"></i>Esci
    </button>
  </form>
</div>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th>Data</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Instagram</th>
          <th>Start</th>
          <th>Goal</th>
          <th>Mail</th>
          <th style="width: 1%"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $row)
          <tr>
            <td class="text-nowrap">{{ $row->created_at->format('d/m/Y H:i') }}</td>
            <td class="fw-semibold">{{ $row->name }}</td>
            <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
            <td>{{ $row->instagram ?: '—' }}</td>
            <td>{{ $row->start_level ?: '—' }}</td>
            <td>{{ $row->goal ?: '—' }}</td>
            <td>
              @if($row->mail_sent)
                <span class="badge text-bg-success"><i class="fa-solid fa-circle-check me-1"></i>Inviata</span>
              @else
                <span class="badge text-bg-danger"><i class="fa-solid fa-circle-xmark me-1"></i>KO</span>
              @endif
            </td>
            <td class="text-nowrap">
              <button class="btn btn-sm btn-outline-primary" type="button"
                      data-bs-toggle="collapse" data-bs-target="#msg-{{ $row->id }}">
                <i class="fa-solid fa-eye me-1"></i>Vedi
              </button>
            </td>
          </tr>
          <tr class="collapse" id="msg-{{ $row->id }}">
            <td colspan="8">
              <div class="p-3 bg-light rounded">
                <div class="fw-bold mb-2">Messaggio</div>
                <div style="white-space: pre-wrap">{{ $row->message }}</div>

                @if(!$row->mail_sent && $row->mail_error)
                  <hr>
                  <div class="fw-bold text-danger mb-1">Errore invio mail</div>
                  <div class="text-muted small" style="white-space: pre-wrap">{{ $row->mail_error }}</div>
                @endif
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="8" class="text-center text-muted py-4">Nessuna richiesta.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $items->links() }}
</div>
@endsection
