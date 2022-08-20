@extends('layout')

@section('title', 'Categorias')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto shadow">
				<h1 class="display-4 text-center mb-3 mt-3">Categorias</h1>
				<a class="btn btn-primary mx-1" href="{{ route('categories.create') }}">Crear categoria</a>
				@forelse($category as $categories)
					<div class="d-flex justify-content-between">
				 		<li class="list-group-item">
							{{$categories->name}}
						</li>
						<div>
							<a class="btn btn-primary btn-sm mx-1 text-white" href="{{ route('categories.edit', $categories )}}">Editar</a>
							<form id="delete-category" class="" action="{{ route('categories.destroy', $categories) }}" method="POST">
								@csrf @method('DELETE')
								<input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
							</form>
						</div>
					</div>
				@empty
					<li class="list-group-item border-0 mb-3 shadow-sm">
						no existe categorias disponibles
					</li>
				@endforelse
			</div>
		</div>
	</div>
@endsection
