@extends('layouts.apps')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><strong>Objective: @foreach($distinct as $distincts) {{$distincts->objective}} @endforeach </strong></h2><a href="/okr" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-arrow-left"></span> Back to OKR</a>
        <div class="clearfix"></div>

      </div>
    <h4>{{$count}} Comment/s</h4>
          <table class="table table-bordered">
            <tr>
              <th style="text-align:center;">Name</th>
              <th style="text-align:center;">Comment</th>
              <th style="text-align:center;">When</th>
              <th style="text-align:center;">Action</th>
            </tr>
          @foreach($comment as $comments)
          <tr style="text-align:center;" id="item{{$comments->id}}">
          <td style="width:20%"><img src="{{ asset('images/blank-profile-picture.jpg') }}" alt="" style="height:80px;"> <h4>{{$comments->fullname}}</h4></td>
          <td style="width:50%">{{$comments->comment}}</td>
          <td style="width:10%">{{$comments->created_at}}</td>
          <td style="width:20%"><button class="delete-modal btn btn-danger"
            data-id="{{$comments->id}}">
              <span class="glyphicon glyphicon-trash"></span>
          </button></td>
          </tr>
          @endforeach
        </table>
    </div>
    
  </div>
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="deleteContent">
              Are you Sure you want to delete <span class="dname"></span> ? <span
                class="hidden did"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn actionBtn" data-dismiss="modal">
                <span id="footer_action_button" class='glyphicon'> </span>
              </button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text("Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('id'));
        $('#myModal').modal('show');
});
$('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'post',
                url: '/deleteItemC',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('.did').text()
                },    
                success: function(data) {
                    $('#item' + $('.did').text()).remove();
                }
            });
          });
</script>   
@endsection