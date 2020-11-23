@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endsection
@include('control.layout.header')
@include('control.layout.nav')
@include('control.layout.menu')


@section('content')
<div class="container "  align="center">
<div class="col-lg-8 " >
<div class="card text-left">
    <div class="card-header">
        <h3 class="card-title">Edit Of Series</h3>
    </div>
    <div class="card-body">
	    @if ($errors->all())
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		  <li>{{ $error }}</li>
		@endforeach
		</div>
		@endif


		{{ Form::open(array('url' =>  '/control/series/'.$series->id, 'method' => 'put', 'files' => true)) }}

			<div class="form-group row">
			{{ Form::label('title', 'Title', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('title',$value = $series->title, ['class' => 'form-control'])  }}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('description',$value = $series->description, ['class' => 'form-control'])  }}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('release_date', 'Release Date', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('release_date',$value = $series->release_date, ['class' => 'form-control'])  }}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('poster_path', 'Poster path', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('poster_path',$value = $series->poster_path, ['class' => 'form-control'])  }}
			</div>
			</div>


			<div class="form-group row">
	      	{{ Form::label('genres', 'Genres', ['class' => 'col-sm-2 col-form-label'])  }}
		    <div class="col-sm-10">
				{{ Form::select('genres[]', App\Models\Genres::pluck('name', 'id'),null,['multiple'=>'multiple','id'=>'sports','class' => 'select2 select2-hidden-accessible','data-placeholder' => 'Select a State','style' => 'width: 100%;', 'data-select2-id' => '8', 'aria-hidden' => 'true'])  }}
		    </div>
			</div>

			<div class="form-group row">
		      	{{ Form::label('tags', 'Tags', ['class' => 'col-sm-2 col-form-label'])  }}
		    <div class="col-sm-10">
				{{ Form::select('tags[]', App\Models\Tags::pluck('name', 'id'),null,['multiple'=>'multiple','id'=>'sports','class' => 'select2 select2-hidden-accessible','data-placeholder' => 'Select a State','style' => 'width: 100%;', 'data-select2-id' => '9', 'aria-hidden' => 'true'])  }}
		    </div>
			</div>

			<div class="form-group d-flex justify-content-center">
				{{ Form::submit('save' , array('class' => 'btn btn-info'))  }}
				{{ Form::button('Cancel' ,array('class' => 'btn btn-default', 'onclick' => "window.location.href='" . URL::previous() . "'"))  }}
			</div>

		{{ Form::close() }}	
 
	</div> 
</div> 
</div>
</div>
@endsection
@include('control.layout.body')
@push('js')
<script src="{{ url('/') }}/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{ url('/') }}/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ url('/') }}/AdminLTE/dist/js/adminlte.min.js"></script>
<script>
$('.select2').select2({
      theme: 'bootstrap4'
    })
$('.select3').select2()
</script>

@endpush
@include('control.layout.footer')

