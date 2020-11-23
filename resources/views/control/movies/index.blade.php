@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@endsection
@include('control.layout.header')
@include('control.layout.nav')
@include('control.layout.menu')


@section('content')

<!-- The Main Table -->
<div class="container">
    <div class="col-lg-14">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable For Movies</h3>
            </div>
            <div class="card-body">
            {{$dataTable->table(['id' => 'actors'])}}   
            </div> 
        </div> 
    </div> 
</div>
<!-- End The Main Table -->

<!-- Start The Model of Delete -->
<div class="modal fade" id="delete-modal">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <h4 class="modal-title">Are you Sure ??</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <form action="" method="POST" id="modal-multi-delete">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-primary" value="Delete">
        </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- End The Model of Delete -->


@endsection
@include('control.layout.body')


@push('js')

<script>

// function for create receord button
function createRow () {
    window.location.replace('{{ URL::current() }}/create');
}

// function for delete receord button
function deleteRows () {
    var allVals = [];  
    $('.sub_chk:checked').each(function() {  
        allVals.push($(this).attr('data-id'));
    });  

    if(allVals.length <=0)  
    {  
        alert('Please select row.');  
    }
    else {  
        var check = $("#delete-modal").modal("show");
    } 
}

$(document).ready(function () {

    // Multi Checkbox
    $('#master').on('click', function(e) {
     if($(this).is(':checked',true))  
     {
        $(".sub_chk").prop('checked', true);  
     } else {  
        $(".sub_chk").prop('checked',false);  
     }  
    });

    //  handle the delete model
    var delForm = $("#modal-multi-delete");
    delForm.submit(function(e){
        e.preventDefault();
        var formData = delForm.serialize();

        var allVals = [];  
        $('.sub_chk:checked').each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        var join_selected_values = allVals.join(','); 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            url: 'moviesMultiDelete',
            type: 'DELETE',
            data: 'ids='+join_selected_values,
            success: function (data) {
                if (data['success']) {
                    $('.sub_chk:checked').each(function() {  
                        $(this).parents('tr').remove();
                    });
                    alert(data['success']);
                    $("#delete-modal").modal("hide");
                } else if (data['error']) {
                    alert(data['error']);
                    $("#delete-modal").modal("hide");
                } else {
                    alert('Whoops Something went wrong!!');
                    $("#delete-modal").modal("hide");
                }
            },
            error: function (data) {
                alert(data.responseText);
                $("#delete-modal").modal("hide");
            }
        });

        $.each(allVals, function( index, value ) {
            $('table tr').filter("[data-row-id='" + value + "']").remove();
        });
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
{{ $dataTable->scripts() }} 
</script>

@endpush
@include('control.layout.footer')

