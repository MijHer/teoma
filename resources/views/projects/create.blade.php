@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">

				@include('partials.error-validation')

				<form class="bg-white py-3 px-4 border-0 shadow rounded"
					method="POST"
					enctype="multipart/form-data"
					action="{{ route('projects.store') }}">
					<h1 class="display-6 py-4">Proyecto Nuevo</h1>
					@include('projects._form', ['btnText' => 'Guardar'])
				</form>
			</div>
		</div>
	</div>
@endsection