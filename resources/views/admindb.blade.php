@extends('layouts.apps')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">

      @hasrole('super-administrator')
      <h2>Administrator Dashboard</h2>
      <div class="clearfix"></div>

    </div>
      <div class="bs-glyphicons">
          <ul class="bs-glyphicons-list">
                  <a href="/admin/user">
                     <li>
                       <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                       <span class="glyphicon-class">Manage Users</span>
                    
                     </li>
                  </a>

                  <a href="/admin/role">
                    <li>
                      <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                      <span class="glyphicon-class">Manage Roles</span>
                    </li>
                 </a>

                 <a href="/okr">
                  <li>
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    <span class="glyphicon-class">View Objective Key Results</span>
                  </li>
               </a>

               <a href="/today">
                <li>
                  <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                  <span class="glyphicon-class">Recent Objective Key Results</span>
                </li>
             </a>

             <a href="/week">
              <li>
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                <span class="glyphicon-class">Task details</span>
             
              </li>
           </a>
           
          </ul>
        </div>
       @else
        <h2>Dashboard</h2>
        <div class="clearfix"></div>

      </div>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">
                   <a href="/okr">
                    <li>
                      <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                      <span class="glyphicon-class">View Objective Key Results</span>
                    </li>
                 </a>
                 <a href="/today">
                  <li>
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                    <span class="glyphicon-class">Recent Objective Key Results</span>
                  </li>
               </a>
               <a href="/week">
                <li>
                  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                  <span class="glyphicon-class">Task details</span>
               
                </li>
             </a>
             
            </ul>
          </div>
    </div>
    @endhasrole
  </div>
</div>
@hasrole('super-administrator')
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Recently Added/Updated OKR</h2>
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
        @if(count($okr) > 0)
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name of User</th>
              <th>Objective</th>
              <th>Username</th>
            </tr>
          </thead>
          <tbody>
            @foreach($okr as $okr1)
            <tr>
            <th scope="row">{{$okr1->okr_id}}</th>
              <td>{{$okr1->name}}</td>
              <td>{{$okr1->objective}}</td>
            <td>{{$okr1->description}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <h2>No Recent Updates</h2>
        @endif
         {!! $okr->render() !!}
      </div>
    </div>
  </div>
  @else
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Recently Added/Updated OKR</h2>
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
            @if(count($okr) > 0)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name of User</th>
                <th>Objective</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>

              @foreach($okr_user as $okr1)
              @if($okr1->user_id == auth()->user()->id)
              <tr>
              <th scope="row">{{$okr1->okr_id}}</th>
                <td>{{$okr1->name}}</td>
                <td>{{$okr1->objective}}</td>
              <td>{{$okr1->description}}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
          @else
          <h2>No Recent updates</h2>
          @endif
           {!! $okr->render() !!}
        </div>
      </div>
    </div>
@endhasrole
  <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>OKR due this week</h2>
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
          @hasrole('super-administrator')
            @if(count($due) > 0)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name of User</th>
                <th>Objective</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>

              @foreach($due as $item)
              <tr>
              <th scope="row">{{$item->okr_id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->objective}}</td>
              <td>{{$item->description}}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
          @else
          <h4>No task is due this week</h4>
          @endif
          @else
          @if(count($due_user) > 0)
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name of User</th>
                <th>Objective</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>

              @foreach($due_user as $item)
              <tr>
              <th scope="row">{{$item->okr_id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->objective}}</td>
              <td>{{$item->description}}</td>
              </tr>
              @endforeach

            </tbody>
          </table>
          @else
          <h4>No task is due this week</h4>
          @endif
@endhasrole
           {!! $okr->render() !!}
        </div>
      </div>
    </div>
<form action="/administrator-dashboard"></form>
@endsection