@extends('layout')

@section('title', 'Portafolio')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center mb-4">
			@isset($category)
			<div>
				<h1 class="display-6 mb-0">{{ $category->name }}</h1>
				<a href="{{ route('projects.index') }}" class="fw-bold">Regresar</a>
			</div>
			@else
				<h1 class="display-6 mb-0">@lang('Portfolio')</h1>
			@endisset
			@can('create', $newProject)
				<a class="btn btn-primary" href="{{ route('projects.create') }}">Crear proyecto nuevo</a>
			@endcan
		</div>
		<div class="d-flex flex-wrap justify-content-between align-items-start shadow">
			@forelse($projects as $project)
				<div class="card border-0 mt-4 mx-auto shadow" style="width: 18rem;">
					<a class="text-decoration-none" href="{{ route('projects.show', $project)}}">
						@if($project->image) {{-- PARA VERIFICAR SI EL PROYECTO TIENE IMAGEN --}}
							<img class="card-img-top" style="height: 250px; object-fit: cover;" src="/storage/{{ $project->image}}" alt="{{ $project->title }}">
						@endif
					</a>
						<div class="card-body">
							<h5 class="card-title">
								<a class="fw-bold text-decoration-none" href="{{ route('projects.show', $project)}}">
									{{ $project->title }}
								</a>
							</h5>
							<h6 class="card-text text-truncate">
								{{ $project->description}}
							</h6>
							<p class="card-text">
								{{ $project->created_at->format('d/m/Y') }}
							</p>
							<div class="d-flex justify-content-between align-items-center">
								<a href="{{ route('projects.show', $project)}}" class="btn btn-primary btn-sm">Ver más</a>
								@if($project->category_id)
									<a href="{{ route('categories.show', $project->category)}}" class="badge bg-dark">{{ $project->category->name }}</a>
								@endif
							</div>
						</div>

				</div>
			@empty
				<li class="list-group-item border-0 mb-3 shadow-sm">
					no se encontro proyectos disponibles
				</li>
			@endforelse
			{{ $projects->links() }}
		</div>
	</div>
	@endsection