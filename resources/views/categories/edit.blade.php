@extends('layout')

@section('title', 'Editar categoria')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">

				@include('partials.error-validation')

				<form class="bg-white py-3 px-4 border-0 shadow rounded"
					method="POST"
					enctype="multipart/form-data"
					action="{{ route('categories.update', $category) }}">
					@csrf @method('PATCH')
					<h1 class="display-6 py-4">Editar categoria</h1>
						<label for="name">Nombre de la categoria</label> <br>
						<input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"> <br>
						<label for="url">ingrese la url categoria</label><br>
						<input type="text" name="url" id="url" value="{{ old('url', $category->url)  }}"> <br>
					<button>Acualizar</button>
				</form>
			</div>
		</div>
	</div>
@endsection