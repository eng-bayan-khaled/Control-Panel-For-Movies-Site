<a class="btn btn-default btn-outline-primary" href="{{ URL::current() }}/{{ $id }}/edit">Edit</a>
<button class="btn btn-default btn-outline-danger" data-toggle="modal" data-target="#imodal" id="sh5" >Delete</button>


<div class="modal fade" id="imodal">
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
      	<form action="{{ URL::current() }}/{{ $id }}" method="POST" id="modal-default5">
      		<input type="hidden" name="_method" value="DELETE">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
      		<input type="submit" class="btn btn-primary" value="Delete">
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
