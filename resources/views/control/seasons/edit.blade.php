@section('css')
<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.css">


@endsection
@include('control.layout.header')
@include('control.layout.nav')
@include('control.layout.menu')


@section('content')
<div class="container "  align="center">
<div class="col-lg-8 " >
<div class="card text-left">
    <div class="card-header">
        <h3 class="card-title">Edit Of Seasons</h3>
    </div>
    <div class="card-body">
    @if ($errors->all())
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
	@endforeach
	</div>
	@endif

	{{ Form::open(array('url' =>  '/control/seasons/'.$seasons->id, 'method' => 'put')) }}

		<div class="form-group row">
		{{ Form::label('summary', 'Summary', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
		{{ Form::text('summary',$seasons->summary, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
		{{ Form::label('season_number', 'Season Number', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
		{{ Form::text('season_number',$seasons->season_number, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
		{{ Form::label('duration', 'Duration', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
		{{ Form::text('duration',$seasons->duration, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
		{{ Form::label('poster_path', 'Poster Path', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
		{{ Form::text('poster_path',$seasons->poster_path, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
	      	{{ Form::label('actors', 'Actors', ['class' => 'col-sm-2 col-form-label'])  }}
		    <div class="col-sm-10">
				{{ Form::select('actors[]', App\Models\Actors::pluck('name', 'id'),
				null
				,['multiple'=>'multiple','id'=>'sports','class' => 'select2 select2-hidden-accessible','data-placeholder' => 'Select a State','style' => 'width: 100%;', 'data-select2-id' => '7', 'aria-hidden' => 'true'])  }}
		    </div>
			</div>

		<div class="form-group row">
	      	{{ Form::label('series_id', 'Series', ['class' => 'col-sm-2 col-form-label'])  }}
	    <div class="col-sm-10">
			{{ Form::select('series_id', App\Models\Series::pluck('title', 'id'),$seasons->series_id, ['class' => 'form-control'])  }}
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


<script src="{{ url('/') }}/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ url('/') }}/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="{{ url('/') }}/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="{{ url('/') }}/AdminLTE/plugins/filterizr/jquery.filterizr.min.js"></script>

<script>
$('.select2').select2({
      theme: 'bootstrap4'
    })
$('.select3').select2()
</script>

@endpush
@include('control.layout.footer')

