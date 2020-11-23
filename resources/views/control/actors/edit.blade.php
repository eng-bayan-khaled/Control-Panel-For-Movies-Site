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
        <h3 class="card-title">Edit Of Actors</h3>
    </div>
    <div class="card-body">
	    @if ($errors->all())
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		  <li>{{ $error }}</li>
		@endforeach
		</div>
		@endif


		{{ Form::open(array('url' =>  '/control/actors/'.$actor->id, 'method' => 'put', 'files' => true)) }}

			<div class="form-group row">
			{{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('name',$value = $actor->name, ['class' => 'form-control'])  }}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{!! Form::textarea('description',$value =$actor->description,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('role', 'Role', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{!! Form::text('role',$value =$actor->role,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
			</div>
			</div>	

			<div class="form-group row">
			{{ Form::label('country', 'Country', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{!! Form::text('country',$value =$actor->country,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('DateOfBirth', 'Date Of Birth', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			<div class="input-group">
			{!! Form::date('DateOfBirth',$value =$actor->DateOfBirth,['class'=>'form-control datetimepicker-input', 'data-target'=>"#reservationdate"]) !!}
	        </div>
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

@endpush
@include('control.layout.footer')

