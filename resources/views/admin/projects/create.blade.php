@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="my-3">Inserisci nuovo Progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">Titolo (*)</label>
                <input
                  id="title"
                  value="{{ old('title') }}"
                  class="form-control @error('title') is-invalid @enderror"
                  name="title"
                  placeholder="title"
                  type="text"
                >
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Descrizione (*)</label>
                <textarea class="form-control"  name="description" id="description" cols="30" rows="10" placeholder="Descrizione">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Immagine (*)</label>
                <input
                  id="image"
                  value="{{ old('image') }}"
                  class="form-control @error('image') is-invalid @enderror"
                  name="image"
                  placeholder="Inserisci link come nell'esempio variando le skills utilizzate nel progetto https://skillicons.dev/icons?i=github,laravel,vue,bootstrap"
                  type="text"
                >
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="form-label">Data inizio Sviluppo (*)</label>
                <input
                  id="date"
                  value="{{ old('date') }}"
                  class="form-control @error('date') is-invalid @enderror"
                  name="date"
                  placeholder="Data di inizio Sviluppo"
                  type="text"
                >
                @error('date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

                <button type="submit" class="btn btn-success">Salva</button>
                <button type="reset" class="btn btn-danger">Cancella</button>
            </form>

        </div>
    </main>

    {{-- Script CK editor 5 --}}
    <script>
      ClassicEditor
          .create( document.querySelector( '#description' ) )
          .catch( error => {
              console.error( error );
          } );
  </script>

@endsection
