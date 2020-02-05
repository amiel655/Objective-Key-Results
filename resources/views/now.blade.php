@extends('layouts.apps')

@section('content')
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Recent Updates</h2>
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

              <a href="/export" class="btn btn-success btn-sm" title="Export to Excel">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Export to Excel file
              </a>
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" title="Send Email" style="text-align:right">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Send Excel to E-mail
              </button>
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">User ID</th>
                    <th class="column-title">Name </th>
                    <th class="column-title">Objective</th>
                    <th class="column-title">Date Received</th>
                    <th class="column-title">Date Due</th>
                    <th class="column-title">Man Hours</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Remarks</th>
                    <th class="column-title">Created At</th>
                    <th class="column-title">Updated At</th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @hasrole('super-administrator')
                  @foreach($okr as $okr1)
                  <tr class="even pointer">
                  <td class=" ">{{$okr1->okr_id}}</td>
                    <td class=" ">{{$okr1->user_id}}</td>
                    <td class=" ">{{$okr1->name}}</td>
                    <td class=" ">{{$okr1->objective}}</td>
                    <td class=" ">{{$okr1->date_recieved}}</td>
                    <td class=" ">{{$okr1->date_due}}</td>
                    <td class=" ">{{$okr1->man_hours}}</td>
                    <td class=" ">{{$okr1->status}}</td>
                    <td class=" ">{{$okr1->remarks}}</td>
                    <td class=" ">{{$okr1->created_at}}</td> 
                    <td class=" ">{{$okr1->updated_at }}</td>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  @foreach($okr as $okr1)
                  @if($okr1->user_id == auth()->user()->id)
                  <tr class="even pointer">
                  <td class=" ">{{$okr1->okr_id}}</td>
                    <td class=" ">{{$okr1->user_id}}</td>
                    <td class=" ">{{$okr1->name}}</td>
                    <td class=" ">{{$okr1->objective}}</td>
                    <td class=" ">{{$okr1->date_recieved}}</td>
                    <td class=" ">{{$okr1->date_due}}</td>
                    <td class=" ">{{$okr1->man_hours}}</td>
                    <td class=" ">{{$okr1->status}}</td>
                    <td class=" ">{{$okr1->remarks}}</td>
                    <td class=" ">{{$okr1->created_at}}</td> 
                    <td class=" ">{{$okr1->updated_at }}</td>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  @endhasrole
                </tbody>
              </table>
            </div>
      
    
          </div>
        </div>
      </div>



<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Upload Excel File</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['action' => 'EmailController@uploadDocument', 'files'=>true])!!}
        {!! Form::file('document',['class' => 'form-control-file'])!!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
      </div>
    </div>
  </div>
</div>
@endsection