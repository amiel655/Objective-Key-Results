@extends('layouts.apps')

@section('content')

<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
              <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="fid" disabled>
                  </div>
                </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Access:</label>
                <div class="col-sm-10">
                    {!!Form::select('access_id' , App\User::all()->pluck('firstname', 'id'), null, ['class'=> 'form-control', 'id'=>'user_id', 'disabled'])!!}
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="level">Level:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="level" disabled>
                </div>
              </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="objective">Objective:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="objective" disabled>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Description: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="description" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="date_received">Date Received:</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="date_received" disabled>
               </div>
             </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Date Due:</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" id="date_due" disabled>
                     </div>
                   </div>
                   <div class="form-group">
                       <label class="control-label col-sm-2" for="name">Man Hours:</label>
                       <div class="col-sm-10">
                         <input type="number" class="form-control" id="man_hours" disabled>
                       </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="name">Status:</label>
                         <div class="col-sm-10">
                           <select name="" id="status" class="form-control" disabled>
                             <option value="10">10%</option>
                             <option value="25">25%</option>
                             <option value="50">50%</option>
                             <option value="75">75%</option>
                             <option value="100">100%</option>
                           </select>
                         </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-sm-2" for="name">Remarks:</label>
                           <div class="col-sm-10">
                             <textarea name="" id="remarks" cols="30" rows="10" class="form-control" disabled></textarea>                    
                           </div>
                         </div>
                <div class="form-group row add">
                    <label class="control-label col-sm-2" for="name">Comment:</label>
                 <div class="col-md-10">
                   <input type="hidden" id="objectives" name="objective">
                   <textarea class="form-control" id="name" name="name"
                     placeholder="Enter some comment"></textarea>
                   <p class="error text-center alert alert-danger hidden"></p>
                 </div>
                 <div class="col-md-9 col-lg-9"></div>
                 <div class="col-md-1 col-lg-1">
                   <button class="btn btn-primary" type="submit" id="add">
                     <span class="glyphicon glyphicon-plus"></span> COMMENT
                   </button>
                 </div>
               </div>
          </form>
          <div class="deleteContent">
            Are you Sure you want to delete <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'></span>
            </button>
            <button type="button" class="btn actionBtnD" data-dismiss="modal">
              <span id="footer_action_buttonD" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
</div>

<div id="myNewModal" class="modal fade" role="dialog"  style="overflow:auto;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fidN" disabled>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="id">Access:</label>
                <div class="col-sm-10">
                    {!!Form::select('access_id' , App\User::all()->pluck('firstname', 'id'), null, ['class'=> 'form-control', 'id'=>'user_idN'])!!}
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-2" for="level">Level:</label>
                  <div class="col-sm-10">
                    <select name="" id="levelN" class="form-control">
                      <option value="Level 1">Level 1</option>
                      <option value="Level 2">Level 2</option>
                      <option value="Level 3">Level 3</option>
                    </select>
                  </div>
                </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="objective">Objective:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="objectiveN">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Description: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="descriptionN">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="date_received">Date Received:</label>
               <div class="col-sm-10">
                 <input type="date" class="form-control" id="date_receivedN">
               </div>
             </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Date Due:</label>
                     <div class="col-sm-10">
                       <input type="date" class="form-control" id="date_dueN">
                     </div>
                   </div>
                   <div class="form-group">
                       <label class="control-label col-sm-2" for="name">Man Hours:</label>
                       <div class="col-sm-10">
                         <input type="number" class="form-control" id="man_hoursN">
                       </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-sm-2" for="name">Status:</label>
                         <div class="col-sm-10">
                           <select name="" id="statusN" class="form-control">
                             <option value="10">10%</option>
                             <option value="25">25%</option>
                             <option value="50">50%</option>
                             <option value="75">75%</option>
                             <option value="100">100%</option>
                           </select>
                         </div>
                       </div>
                       <div class="form-group">
                           <label class="control-label col-sm-2" for="name">Remarks:</label>
                           <div class="col-sm-10">
                             <textarea name="" id="remarksN" cols="30" rows="10" class="form-control"></textarea>                    
                           </div>
                         </div>
          </form>
          <div class="deleteContent">
            Are you Sure you want to delete <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_buttonN" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
            <div class="x_panel">
              <div class="x_title">
                <h2>Objective Key Results </h2>
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
                <div class="table-responsive">
                  <a href="{{ url('/okr/create') }}" class="btn btn-success btn-sm" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </a>
                  <div class="container">
                          <form action="/search" method="POST" role="search">
                              {{ csrf_field() }}
                              <div class="input-group">
                                  <input type="text" class="form-control" name="q"
                                      placeholder="Search"> <span class="input-group-btn">
                                      <button type="submit" class="btn btn-default">
                                          <span class="glyphicon glyphicon-search"></span>
                                      </button>
                                  </span>
                              </div>
                          </form>
                      </div>
                  @hasrole('super-administrator')
                  @if(isset($okr))
                  @if(count($okr) > 0)
                  <script src="/js/ddtf.js"></script>

                  <table class="table table-striped bulk_action" id="table-format">
                    <thead>
                      <tbody>
                      @foreach($okr as $okr1)

                      <div class="message_wrapper" id="item{{$okr1->okr_id}}">
                      <a class="view-modal" href="#" data-id="{{$okr1->okr_id}}" data-user_id="{{$okr1->user_id}}"
                      data-objective="{{$okr1->objective}}" data-description="{{$okr1->description}}" data-name="{{$okr1->name}}"
                            data-date_received="{{$okr1->date_recieved}}" data-level="{{$okr1->level}}"
                            data-date_received="{{$okr1->date_received}}" data-days_ago="{{$okr1->days_ago}}"
                            data-date_due="{{$okr1->date_due}}" data-man_hours="{{$okr1->man_hours}}"
                      data-status="{{$okr1->status}}" data-remarks="{{$okr1->remarks}}"><h4 class="heading">{{$okr1->objective}}</h4></a>
                        <blockquote class="message">{{$okr1->description}}</blockquote>

                        </form>
                          <br />
                          <p class="url">
                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                            <span><i class="fa fa-paperclip"></i>Date Received: {{$okr1->created_at->format('Y-m-d')}} </a>
                          <span style="padding-left:5em">Date Due: {{$okr1->date_due}}</span>
                          <span style="padding-left:5em">Days Ago: {{Carbon\Carbon::parse($okr1->date_recieved)->diffForHumans()}}</span>
                            <span style="padding-left:5em">Owner: {{$okr1->name}}</span><br>
                            <span style="padding-left:5em"></span>
                          {!! Form::open(['action' => 'CommentController@viewComment','id'=>'demo-form2', 'data-parsley-validate','class'=>'demo-form2' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                          {{Form::hidden('okr_id', $okr1->okr_id)}}
                          {{Form::submit(App\Comment::where('okr_id', $okr1->okr_id)->count().' Comments',['name'=>'view','class'=>'btn btn-default','id' => "add"])}}
                          <span style="padding-left:5em"></span>
                          <br><br>
                        Status: {{$okr1->status}}%<div class="w3-border" style="width:25%">
                            <div class="" style="height:24px;width:{{$okr1->status}}%;background-color:#26B99A"></div>
                          </div>
                          </p>
                        </div>
                        <hr>
                        <script>
                          $('.remarks_type').hide();
                        </script>
                      @endforeach
                      </tbody>
                  </thead>
                  </table>

                
                  {!! $okr->render() !!}
                  @else
                  @endif
                  @endif

@else

                @if(isset($okr))
                        @if(count($okr) > 0)
                        <script src="/js/ddtf.js"></script>

                        <table class="table table-striped bulk_action" id="table-format">
                          <thead>
                            <tbody>
                            @foreach($okr as $okr1)
                              @if(auth()->user()->id == $okr1->user_id || auth()->user()->access_id == $okr1->user_id)
                            <div class="message_wrapper" id="item{{$okr1->okr_id}}">
                            <a class="view-modal" href="#" data-id="{{$okr1->okr_id}}" data-user_id="{{$okr1->user_id}}"
                                  data-level="{{$okr1->level}}"
                                  data-objective="{{$okr1->objective}}" data-description="{{$okr1->description}}" data-date_received="{{$okr1->date_recieved}}"
                                  data-date_due="{{$okr1->date_due}}" data-man_hours="{{$okr1->man_hours}}"
                                  data-status="{{$okr1->status}}" data-remarks="{{$okr1->remarks}}"><h4 class="heading">{{$okr1->objective}}</h4></a>
                              <blockquote class="message">{{$okr1->description}}</blockquote>

                              </form>
                                <br />
                                <p class="url">
                                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                  <span><i class="fa fa-paperclip"></i>Date Received: {{$okr1->date_recieved}} </a>
                                <span style="padding-left:5em">Date Due: {{$okr1->date_due}}</span>
                                <span style="padding-left:5em">Date Ago: {{Carbon\Carbon::parse($okr1->date_recieved)->diffForHumans()}}</span><br>
                                <span style="padding-left:5em"></span>
                                {!! Form::open(['action' => 'CommentController@viewComment','id'=>'demo-form2', 'data-parsley-validate','class'=>'demo-form2' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{Form::hidden('okr_id', $okr1->okr_id)}}
                                {{Form::submit(App\Comment::where('okr_id', $okr1->okr_id)->count().' Comments', ['name'=>'view','class'=>'btn btn-default','id' => "add"])}}
                                <span style="padding-left:5em"></span>
                                <br><br>
                              Status: {{$okr1->status}}%<div class="w3-border" style="width:25%">
                                  <div class="" style="height:24px;width:{{$okr1->status}}%;background-color:#26B99A"></div>
                                </div>
                                </p>
                              </div>
                              <hr>
                              <script>
                                $('.remarks_type').hide();
                              </script>
                              @endif
                            @endforeach
                            </tbody>
                        </thead>
                        </table>

                      
                        {!! $okr->render() !!}
                        @else
                        @endif
                        @endif
                      </div>


                      @endhasrole
      
                    <div id="myNewModal" class="modal fade" role="dialog"  style="overflow:auto;">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" role="form">
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="id">ID:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fidN" disabled>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="id">Access:</label>
                                    <div class="col-sm-10">
                                        {!!Form::select('access_id' , App\User::all()->pluck('firstname', 'id'), null, ['class'=> 'form-control', 'id'=>'user_idN'])!!}
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-2" for="level">Level:</label>
                                      <div class="col-sm-10">
                                        <select name="" id="levelN" class="form-control">
                                          <option value="Level 1">Level 1</option>
                                          <option value="Level 2">Level 2</option>
                                          <option value="Level 3">Level 3</option>
                                        </select>
                                      </div>
                                    </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="objective">Objective:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="objectiveN">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Description: </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="descriptionN">
                                    </div>
                                  </div>
                                      <div class="form-group">
                                          <label class="control-label col-sm-2" for="name">Date Due:</label>
                                         <div class="col-sm-10">
                                           <input type="date" class="form-control" id="date_dueN">
                                         </div>
                                       </div>
                                       <div class="form-group">
                                           <label class="control-label col-sm-2" for="name">Man Hours:</label>
                                           <div class="col-sm-10">
                                             <input type="number" class="form-control" id="man_hoursN">
                                           </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="control-label col-sm-2" for="name">Status:</label>
                                             <div class="col-sm-10">
                                               <select name="" id="statusN" class="form-control">
                                                 <option value="10">10%</option>
                                                 <option value="25">25%</option>
                                                 <option value="50">50%</option>
                                                 <option value="75">75%</option>
                                                 <option value="100">100%</option>
                                               </select>
                                             </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="control-label col-sm-2" for="name">Remarks:</label>
                                               <div class="col-sm-10">
                                                 <textarea name="" id="remarksN" cols="30" rows="10" class="form-control"></textarea>                    
                                               </div>
                                             </div>
                              </form>
                              <div class="deleteContent">
                                Are you Sure you want to delete <span class="dname"></span> ? <span
                                  class="hidden did"></span>
                              </div>
                              <div class="modal-footer ">
                                <button type="button" class="btn actionBtn" data-dismiss="modal">
                                  <span id="footer_action_buttonN" class='glyphicon'> </span>
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                  <span class='glyphicon glyphicon-remove'></span> Close
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
                </div>
              </div>



      <script>$(document).ready(function() {
          $(document).on('click', '.view-modal', function() {
                $('#footer_action_button').text("Update");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('#footer_action_buttonD').text("Delete");
                $('#footer_action_buttonD').addClass('glyphicon-trash');
                $('#footer_action_button_view').text("Comments");
                $('#footer_action_button_view').addClass('glyphicon-eye-open');
 
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('delete');
                $('.actionBtnD').addClass('delete-modal');
                $('.actionBtnD').addClass('btn-danger');
                $('.actionBtn_view').addClass('btn-info');
                $('.actionBtn_view').addClass('comment-modal');
                $('.actionBtn').addClass('update');
                $('.modal-title').text('View');
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('#fid').val($(this).data('id'));
                $('#user_id').val($(this).data('user_id'));
                $('#level').val($(this).data('level'));
                $('#objective').val($(this).data('objective'));
                $('#objectives').val($(this).data('objective'));
                $('#description').val($(this).data('description'));
                $('#date_received').val($(this).data('date_received'));
                $('#days_ago').val($(this).data('days_ago'));
                $('#date_due').val($(this).data('date_due'));
                $('#man_hours').val($(this).data('man_hours'));
                $('#status').val($(this).data('status'));
                $('#remarks').val($(this).data('remarks'));
                $('#myModal').modal('show');
            });
            $(document).on('click', '.delete-modal', function() {
              $('#footer_action_buttonN').text("Delete");
              $('#footer_action_buttonN').removeClass('glyphicon-check');
              $('#footer_action_buttonN').addClass('glyphicon-trash');
              $('.actionBtn').removeClass('btn-success');
              $('.actionBtn').addClass('btn-danger');
              $('.actionBtn').removeClass('update');
              $('.actionBtn').addClass('delete');
              $('.modal-title').text('Delete');
              $('.did').text($('#fid').val());
              $('.deleteContent').show();
              $('.form-horizontal').hide();
              $('.dname').html($('#fid').val());
              $('#myNewModal').modal('show');
    });
    $(document).on('click', '.update', function(){
      $('body').addClass('modal-open');
      $('#footer_action_buttonN').text("Edit");
      $('#footer_action_buttonN').addClass('glyphicon-check');
      $('.actionBtn').addClass('edit');
      $('.actionBtn').removeClass('delete');
      $('.actionBtn').removeClass('update');
      $('#fidN').val($('#fid').val());
      $('#user_idN').val($('#user_id').val());
      $('#levelN').val($('#level').val());
      $('#objectiveN').val($('#objective').val());
      $('#descriptionN').val($('#description').val());
      $('#date_receivedN').val($('#date_received').val());
      $('#days_agoN').val($('#days_ago').val());
      $('#date_dueN').val($('#date_due').val());
      $('#man_hoursN').val($('#man_hours').val());
      $('#statusN').val($('#status').val());
      $('#remarksN').val($('#remarks').val());
      $('#myNewModal').modal('show');
    });
            $('.modal-footer').on('click', '.edit', function() {
      
              $.ajax({
                  type: 'post',
                  url: '/editItem',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'id': $("#fidN").val(),
                      'user_id': $("#user_idN").val(),
                      'level': $('#levelN').val(),
                      'objective': $('#objectiveN').val(),
                      'description': $('#descriptionN').val(),
                      'date_received': $('#date_receivedN').val(),
                      'date_due': $('#date_dueN').val(),
                      'man_hours': $('#man_hoursN').val(),
                      'status': $('#statusN').val(),
                      'remarks': $('#remarksN').val(),
                  },
                  success: function(data) {
                    $('#item'+($("#fid").val())).replaceWith("<div class='message-wrapper' id='item"+ ($("#fid").val()) + "'><a class='view-modal' href='#' data-id='"+($("#fid").val())+"' data-objective='"+ data.objective +"' data-description='"+ data.description +"' data-date_received='"+ data.date_recieved +"' data-level='"+
                     data.level +"' data-user_id='"+ data.user_id +"' data-date_due='"+
                     data.date_due +"' data-date_received='"+ data.date_recieved +"' data-man_hours='"+ data.man_hours +"' data-status='"+ data.status +"' data-remarks='"+
                     data.remarks +"'><h4 class='heading'>"+ data.objective +"</h4></a><blockquote class='message'>"+data.description+"</blockquote><br><p class='url'> <span class='fs1 text-info' aria-hidden='true' data-icon=''></span><i class='fa fa-paperclip'></i>Date Received:"
                    + data.date_recieved +"<span style='padding-left:5em'>Date Due: "+ data.date_due +"<span style='padding-left:5em'>Owner: "+ data.name + "<form action={{ action('CommentController@viewComment')}} method='post'><input type='hidden' name='_token' value='{{ csrf_token() }}'><input type='hidden' value="+$("#fid").val()+" name='okr_id'><input name='view' class='btn btn-default' id='add' type='submit' value='View Comments'></form>"+"</span>"+"<span style='padding-left:5em'></span><br><br>Status: "+
                     data.status +"% Complete <span style='padding-left:5em'> <div class='w3-border' style='width:25%'><div style='height:24px;width:"+data.status+"%;background-color:#26B99A'></div></div>");
                  }                               
              });
          });
          $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'post',
                url: '/deleteItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $('#fid').val()
                },
                success: function(data) {
                    $('#item' + $('#fid').val()).remove();
                }
            });
          });
$("#add").click(function() {

$.ajax({
    type: 'post',
    url: '/addItem',
    data: {
        '_token': $('input[name=_token]').val(),
        'okr_id': $('#fid').val(),
        'objective': $('input[name=objective]').val(),
        'name': $('textarea[name=name]').val()
    },
    success: function(data) {
        if ((data.errors)){
          $('.error').removeClass('hidden');
            $('.error').text(data.errors.name);
        }
        else {
           alert("Comment Added!");
        }
    },

});
$('#name').val('');
});
        });</script>
@endsection