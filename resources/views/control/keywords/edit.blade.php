@section('css')
@endsection
@include('control.layout.header')
@include('control.layout.nav')
@include('control.layout.menu')


@section('content')
<div class="container "  align="center">
<div class="col-lg-8 " >
<div class="card text-left">
    <div class="card-header">
        <h3 class="card-title">Edit Of Keywords</h3>
    </div>
    <div class="card-body">
	    @if ($errors->all())
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		  <li>{{ $error }}</li>
		@endforeach
		</div>
		@endif


		{{ Form::open(array('url' =>  '/control/keywords/'.$keyword->id, 'method' => 'put', 'files' => true)) }}

			<div class="form-group row">
			{{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('name',$value = $keyword->name, ['class' => 'form-control'])  }}
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
@endpush
@include('control.layout.footer')

