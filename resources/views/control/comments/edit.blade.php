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
        <h3 class="card-title">Edit Of Comments</h3>
    </div>
    <div class="card-body">
    @if ($errors->all())
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
	@endforeach
	</div>
	@endif

	{{ Form::open(array('url' =>  '/control/comments/'.$comment->id, 'method' => 'put')) }}

		<div class="form-group row">
		{{ Form::label('content', 'Content', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
			{{ Form::text('content', $comment->content, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
		{{ Form::label('status', 'Status', ['class' => 'col-sm-2 col-form-label'])  }}
		<div class="col-sm-10">
			{{ Form::select('status', array('0' => 'Not active', '1' => 'Active'),$comment->status, ['class' => 'form-control'])  }}
		</div>
		</div>

		<div class="form-group row">
	      	{{ Form::label('user_id', 'User', ['class' => 'col-sm-2 col-form-label'])  }}
	    <div class="col-sm-10">
			{{ Form::select('user_id', App\Models\Users::pluck('name', 'id'),$comment->user_id, ['class' => 'form-control'])  }}
	    </div>
		</div>

		<div class="form-group row">
	      	{{ Form::label('article_id', 'Article', ['class' => 'col-sm-2 col-form-label'])  }}
	    <div class="col-sm-10">
			{{ Form::select('article_id', App\Models\Articles::pluck('title', 'id'),$comment->article_id, ['class' => 'form-control'])  }}
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
<script>
$('.select2').select2({
      theme: 'bootstrap4'
    })
$('.select3').select2()



$('#series').change(function(){
	var Series = $('#series').val();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
    $.ajax({
        url: "/control/getSeasons/" + Series,
        dataType:"json",
        type: "post",
        success: function(data){
        	
        	var output = '';
        	if (data.length > 0){
        		for (i in data){
					console.log(data[i].id);
					console.log(data[i].summary);
					output += '<option value="'+ data[i].id +'">' + data[i].summary + '</option>';

				}

				$('#seasons').html(output);
        	}else {
	        	output += '<option value="'+ data[Series].id +'">' + data[Series].summary + '</option>';
	        	$('#seasons').html(output);
        	}
        }
    });
});
</script>


@endpush
@include('control.layout.footer')

