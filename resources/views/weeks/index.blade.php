@extends('layouts.apps')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>View Week of a task</h2>
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

            <table class="table">
              <thead>
                <tr>
                  <th>Week Number</th>
                  <th>Date Range</th>
                </tr>
              </thead>
              <tbody>
                  <?php  
                  for ($x = 1; $x <= now()->weekOfYear; $x++) {
                    $date = new DateTime();
                    
                    echo "<tr>";
                      echo "<form action='/search' method='POST' role='search'>".
                             csrf_field() ." 
                            <input type='hidden' name='q'
                            value='$x'>
                            <td><button type='submit' class='btn btn-default'>
                            $x
                            </button></td>
                          </form>";
                    echo "<td>".$date->setISODate(now()->year, $x)->format('F j, Y'). " -- ". $date->setISODate(now()->year, $x)->modify('+6 days')->format('F j, Y')."</td>";
                    echo "</tr>";
                  }
                  ?>  
              </tbody>
            </table>
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