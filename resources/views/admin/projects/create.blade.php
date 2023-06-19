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


        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">Titolo (*)</label>
                <input
                  id="title"
                  value="{{ old('title') }}"
                  class="form-control @error('title') is-invalid @enderror"
                  name="title"
                  placeholder="Titolo progetto"
                  type="text"
                >
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Descrizione (*)</label>
                <textarea class="form-control"  name="description" id="description" cols="30" rows="10" placeholder="Descrivi il progetto">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="form-label">Immagine (*) <br> Inserisci come nell'esempio le skills utilizzate nel progetto, scritte in piccolo e separate da virgola</label>
                <input
                  id="image"
                  value="{{ old('image') }}"
                  class="form-control @error('image') is-invalid @enderror"
                  name="image"
                  placeholder="github,laravel,vue,bootstrap"
                  type="text"
                >
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="thumb" class="form-label">Immagine Progetto</label>
                <input
                  id="thumb"
                  onchange="showImage(event)"
                  class="form-control @error('thumb') is-invalid @enderror"
                  name="thumb"
                  type="file"
                >
                <img class="mt-3 rounded-2" style="width: 200px" id="prev-image" src="" alt="">
            </div>

            <div class="mb-4">
                <label for="date" class="form-label">Data inizio Sviluppo</label>
                <input
                  id="date"
                  value="{{ old('date') }}"
                  class="form-control @error('date') is-invalid @enderror"
                  name="date"
                  placeholder="dd/mm/yyyy"
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

      function showImage(event){
        const tagImage = document.getElementById('prev-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
      }
  </script>

@endsection
