
@extends('layouts.apps')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>User Management</h2>
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
                            <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn-sm" title="Add New user">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>

                                <table class="table table-striped bulk_action">
                                  <thead>
                                    <tr>
                                        <th>#</th><th>Firstname</th><th>Lastname</th><th>Department</th><th>Email</th><th>Actions</th>
                                    </tr>
                                    <tbody>
                                        
                                        @foreach($user as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->firstname }}</td><td>{{ $item->lastname }}</td><td>{{ $item->department }}</td><td>{{ $item->email }}</td>
                                            <td>
                                              
                                                <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/admin/user', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => 'Delete user',
                                                            'onclick'=>'return confirm("Confirm delete?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </thead>
                                </table>
                        </div>
                  
                        @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
      
@endsection

