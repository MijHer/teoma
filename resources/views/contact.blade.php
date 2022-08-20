@extends('layout')

@section('title', 'contact')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">
				<form class="bg-white shadow rounded py-3 px-4" action="{{ route('contact.store')}}" method="POST">
					@csrf
					<h1 class="display-4 text-center ">@lang('Contact')</h1>
					<div class="form-group">
						<label for="name">Nombre</label>
						<input class="form-control bg-white shadow-sm @error('name') is-invalid @else border-0 @enderror" type="text" id="name" name="name"  value="{{ old('name') }}">
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control bg-white shadow-sm @error('email') is-invalid @else border-0 @enderror" id="email" type="email" name="email" value="{{ old('email') }}">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="subjet">Asunto</label>
						<input class="form-control bg-white shadow-sm @error('subjet') is-invalid @else border-0 @enderror" id="subjet" type="text" name="subjet" value="{{ old('subjet') }}">
						@error('subjet')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="content">Contenido</label>
						<textarea class="form-control bg-white shadow-sm @error('content') is-invalid @else border-0 @enderror" id="content" name="content">{{ old('content') }}</textarea>
						@error('content')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="d-grid">
						<button class="btn btn-primary btn-lg btn-block fw-bold">Enviar</button>
					</div>

				</form>
			</div>
		</div>

	</div>
@endsection