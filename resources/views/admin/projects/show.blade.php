@extends('layouts.app')


@section('content')
<main class="pt-3">
    <div class="container my-4">
        <h2 class="mb-5">Dettaglio Progetto | {{$project->title}}
          <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>
          
          @include('admin.partials.form-delete')

        </h2>

            <div class="d-flex mb-4">
              <img class="w-75 mb-4 rounded-3" id="prev-image" src="{{ asset('storage/' . $project->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="{{ $project->title }}">
            </div>

          <div class="card-wrapper d-flex gap-3 w-75">
                <img class="rounded w-50" src="https://skillicons.dev/icons?i={{ $project->image }}&perline=3" alt="{{$project->title}}" title="{{$project->title}}">
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
