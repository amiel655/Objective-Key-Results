@extends('layouts.apps')

@section('content')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Admin Dashboard <small>Custom design</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                <div class="table-responsive">
                  <a href="{{ url('/week/create') }}" class="btn btn-success btn-sm" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </a>
                        @if(count($week) > 0)
                        <table class="table table-striped bulk_action">
                          <thead>
                          <tr>
                            <th class="column-title">Objective</th>
                            <th class="column-title" >Date</th>
                            <th class="column-title">Action</th>
                          </tr>
                            <tbody>
                            @foreach($week as $week1)
                            @if(Auth::user()->id == $week1->user_id)
                            <tr id="item{{$week1->id}}">
                            <td>{{$week1->objective}}</td>
                            <td>{{$date->setISODate($week1->year, $week1->weeknum)->format('F j, Y')}} -- {{$date->endOfWeek()->format('F j, Y') }}</td> 
                            <td><button class="delete-modal btn btn-danger"
                              data-id="{{$week1->id}}">
                          <span class="glyphicon glyphicon-trash"></span>
                          </button></td>
                          </tr>
                          @endif  
                            @endforeach
                            </tbody>
                        </thead>
                        </table>
                        @endif
                </div>
        
              </div>
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
                url: '/deleteItemW',
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

