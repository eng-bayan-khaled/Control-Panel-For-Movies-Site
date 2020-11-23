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
        <h3 class="card-title">Edit Of Categories</h3>
    </div>
    <div class="card-body">
	    @if ($errors->all())
		<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		  <li>{{ $error }}</li>
		@endforeach
		</div>
		@endif


		{{ Form::open(array('url' =>  '/control/categories/'.$categorie->id, 'method' => 'put', 'files' => true)) }}

			<div class="form-group row">
			{{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
			{{ Form::text('name',$value = $categorie->name, ['class' => 'form-control'])  }}
			</div>
			</div>

			<div class="form-group row">
			{{ Form::label('parent_id', 'Parent', ['class' => 'col-sm-2 col-form-label'])  }}
			<div class="col-sm-10">
				<select class="form-control" name="parent_id" id="cars">
					<option value=""></option>
					@foreach ($cate as $cat)
						@if ($cat->id == $categorie->parent_id)
				  			<option value="{{$cat->id}}" selected>{{$cat->name}}</option>
						@else
							<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
				  	@endforeach
				</select>
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

