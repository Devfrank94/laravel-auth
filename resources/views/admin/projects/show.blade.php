@extends('layouts.app')


@section('content')
<main class="pt-3">
    <div class="container my-4">
        <h2 class="mb-3">Dettaglio Progetto | {{$project->title}} <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>
            <form class="d-inline" action="{{route('admin.projects.destroy', $project)}}" onsubmit="return confirm('Confermi l\'eliminazione di {{ $project->title }} ?')" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can" title="Elimina" style="color: #ffffff;"></i></button>
            </form>
        </h2>



            <div class="card-wrapper d-flex gap-3 w-100">
                <img class="rounded w-50" src="{{$project->image}}" alt="{{$project->title}}" title="{{$project->title}}">
            <div class="card w-75">
                <div class="card-body d-flex flex-column gap-1">
                <h5 class="card-title">{{$project->title}}</h5>
                <p><div class="fw-bold">Descrizione:</div> {!!$project->description!!}</p>
                <span><div class="fw-bold">Data di inizio sviluppo:</div> {{ $data_formatted }}</span>
                <a href="{{route('admin.projects.index')}}" class=" btn btn-primary mt-5 w-100 fs-4 align-self-center">Indietro</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
