@extends('layout')

@section('title', 'Portafolio')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-8 mx-auto">
				@if($project->image) {{-- PARA VERIFICAR SI EL PROYECTO TIENE IMAGEN --}}
					<img class="card-img-top img img-fluid" src="/storage/{{ $project->image}}" alt="{{ $project->title }}">
				@endif
					<h1 class="mb-0">{{ $project->title}}</h1>
					@if($project->category_id)
						<a href="{{ route('categories.show', $project->category)}}" class="badge bg-dark mb-1">{{ $project->category->name }}</a>
					@endif
					<p>{{ $project->description}}</p>
					<p><strong>{{ $project->created_at->diffForHumans()}}</strong></p>
					<div class="d-flex justify-content-between">
						<a class="text-decoration-none fw-bold" href="{{ route('projects.index') }}">Regresar</a>
						@auth
							<div class="btn-group btn-group-sm">
								{{-- @can('update', $project) --}}
									<a class="btn btn-primary mx-1 text-white" href="{{ route('projects.edit', $project )}}">Editar</a>
								{{-- @endcan --}}
								@can('delete', $project)
									<a class="btn btn-danger text-white" href="#" onclick="document.getElementById('delete-project').submit();">
										Eliminar
									</a>
									<form id="delete-project" class="d-none" action="{{ route('projects.destroy', $project) }}" method="POST">
										@csrf @method('DELETE')
									</form>
								@endcan
							</div>
						@endauth
					</div>
			</div>
		</div>
	</div>
@endsection