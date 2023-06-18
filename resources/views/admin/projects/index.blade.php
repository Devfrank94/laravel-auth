@extends('layouts.app')

@section('content')
<main>
<div class="container my-4">
    <h1 class="mb-4">Elenco Portfolio</h1>

    <a href="{{route('admin.projects.create')}}" class="btn btn-success mb-3"><i class="fa-solid fa-file-circle-plus"></i> Crea Nuovo Progetto</a>
        @if (session('trashElement'))
            <div class="alert alert-success" role="alert">
                {{ session('trashElement') }}
            </div>
        @endif
    <div class="border border-1 mb-3">
    <table class="table table-hover mb-0">
        <thead class="text-center">
            <tr>
                <th scope="col"><a href="{{ route('admin.orderby', ['direction' => $direction]) }}" class="text-black">#ID</a></th>
                <th scope="col">Titolo</th>
                <th scope="col">Data inizio sviluppo</th>
                <th scope="col">Vedi</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
            <tbody class="text-center">
                @foreach ($projects as $project)
                    <tr class="vertical-align-middle">
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->title}}</td>
                        @php
                          $date = date_create($project->date);
                        @endphp
                        <td>{{ date_format($date, 'd/m/Y')}}</td>
                        <td>
                          <a href="{{route('admin.projects.show', $project)}}" class="btn btn-secondary"><i class="fa-regular fa-eye" title="Vedi" style="color: #ffffff;"></i></a>
                        </td>
                        <td>
                          <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('admin.projects.destroy', $project)}}" onsubmit="return confirm('Confermi l\'eliminazione di {{ $project->title }} ?')" method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger d-inline"><i class="fa-regular fa-trash-can" title="Elimina" style="color: #ffffff;"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
  </div>
  {{-- Pagination --}}
  <div>
    {{ $projects->links() }}
  </div>
</div>
</main>

@endsection
