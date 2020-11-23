@section('css')

@endsection
@include('control.layout.header')
@include('control.layout.nav')
@include('control.layout.menu')


@section('content')
<div class="container">
<div class="col-lg-14">









<div class="card text-left card-primary">
    <div class="card-header">
        <h3 class="card-title">Photos For Photos</h3>
    </div>
    <div class="card-body">
        {{ Form::open(array('url' =>  '/control/photos', 'method' => 'post', 'files' => true)) }}

            <input name="id" type="hidden" value="">
            <div class="form-group row">
                {{ Form::label('photos', 'Photos', ['class' => 'col-sm-2 col-form-label'])  }}
                {{  Form::file('photos[]',['multiple' => 'multiple'],['class'=>'form-control', 'rows' => 2, 'cols' => 40])  }}
                <div class="col-sm-10">
                <div class="form-group row">
                        {{ Form::submit('save' , array('class' => 'btn btn-info'))  }}
                </div>
                </div>
            </div>
        {{ Form::close() }} 
        @if($photos->count())
            <div class="row">
            @foreach ($photos as $photo)
                <div class="col-sm-2">
                    <a href="{{ $photo->path }}" data-toggle="lightbox" data-title="" data-gallery="gallery">
                    <img src="{{ $photo->path }}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                    <input type="checkbox" class="sub_chk" id="master" data-id="{{$photo->id}}">
                </div>
            @endforeach
            </div>
            <button class="btn btn-danger btn-sm" onclick="myFunction()">Delete</button>
        @endif


    </div> 
    </div>


</div> 
</div>

@endsection
@include('control.layout.body')


@push('js')
<script type="text/javascript">


 $(document).ready(function () {
    $('#master').on('click', function(e) {
     if($(this).is(':checked',true))  
     {
        $(".sub_chk").prop('checked', true);  
     } else {  
        $(".sub_chk").prop('checked',false);  
     }  
    });
});
function myFunction(){
    var allVals = [];
    $('#master:checked').each(function() {  
        allVals.push($(this).attr('data-id'));
    }); 

    if(allVals.length <=0)  
    {  
        alert('Please select row.');  
    }else {  
        var check = confirm('Are you sure you want to delete this row?');  
        if(check == true){  


            var join_selected_values = allVals.join(','); 


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/control/photos',
                type: 'DELETE',
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $('.sub_chk:checked').each(function() {  
                            $(this).parents('.col-sm-2').remove();
                        });
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            }); 


          $.each(allVals, function( index, value ) {
            $('table tr').filter("[data-row-id='" + value + "']").remove();
          });
        }  
    }
}


</script>

@endpush
@include('control.layout.footer')

