
<form action="{{route('admin.projects.destroy', $project)}}" onsubmit="return confirm('Confermi l\'eliminazione di {{ $project->title }} ?')" method="POST" class="d-inline">

  @csrf
  @method('DELETE')

  <button type="submit" class="btn btn-danger d-inline"><i class="fa-regular fa-trash-can" title="Elimina" style="color: #ffffff;"></i></button>
</form>
