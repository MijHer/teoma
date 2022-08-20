@extends('layout')

@section('title', 'Crear categoria')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">

				@include('partials.error-validation')

				<form class="bg-white py-3 px-4 border-0 shadow rounded"
					method="POST"
					enctype="multipart/form-data"
					action="{{ route('categories.store') }}">
					@csrf
					<h1 class="display-6 py-4">Categoria Nuevo</h1>
					<label for="name">Nombre de la categoria</label> <br>
					<input type="text" name="name" id="name"> <br>
					<label for="url">ingrese la url categoria</label><br>
					<input type="text" name="url" id="url"> <br>
					<button>guardar</button>
				</form>
			</div>
		</div>
	</div>
@endsection