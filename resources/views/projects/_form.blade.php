@csrf
	@if($project->image) {{-- PARA VERIFICAR SI EL PROYECTO TIENE IMAGEN --}}
		<img class="card-img-top mb-2"
			style="height: 350px; object-fit: cover;"
			src="/storage/{{ $project->image}}"
			alt="{{ $project->title }}">
	@endif
	<div class="mb-3">
		  <label for="formFileSm" class="form-label">Agrege imagen</label>
		  <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
	</div>
	<div class="form-group mb-3">
	  <label class="input-group" for="category_id">Selecione categoria</label>
	  <select class="form-control form-select border-0 bg-light shadow-sm" name="category_id" id="category_id">
	    <option value="">Selecione</option>
	    @foreach($categories as $id => $name)
	    	<option value="{{ $id }}"
	    		@if($id == old('category_id', $project->category_id ) ) selected @endif
	    	>
	    	{{ $name }}</option>
	    @endforeach
	  </select>
	</div>
	<div class="form-group">
		<label for="title">Titulo del proyecto</label>
		<input class="form-control border-0 bg-light shadow-sm" type="text" id="title" name="title" value="{{ old('title', $project->title) }}">
	</div>
	<div class="form-group">
		<label for="url">Url del proyecto</label>
		<input class="form-control border-0 bg-light shadow-sm" type="text" id="url" name="url" value="{{ old('url', $project->url) }}">
	</div>
	<div class="form-group">
		<label for="description">Descripcion del proyecto</label>
			<textarea class="form-control border-0 bg-light shadow-sm" id="description" name="description"> {{ old('description', $project->description) }}
			</textarea>
	</div>
	<div class="d-grid">
		<button class="btn btn-primary btn-lg btn-block fw-bold">{{ $btnText}}</button>
	</div>
	<div class="d-grid">
		<a class="btn btn-link btn-block btn-lg btn-outline-primary fw-bold mt-3 text-decoration-none" href="{{ route('projects.index')}}">
			Cancelar
		</a>
	</div>




