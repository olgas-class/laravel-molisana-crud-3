@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>
      Lista delle paste
    </h1>

    <a href="{{ route('pastas.create') }}">Crea una nuova pasta</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Titolo</th>
          <th scope="col">Tipologia</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaPasta as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->title }}</td>
            <td>{{ $item->type }}</td>
            <td>
              <a href="{{ route('pastas.show', ['pasta' => $item->id]) }}">Dettagli</a>
              <a href="{{route('pastas.edit' , ['pasta' => $item->id])}}">Modifica</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
