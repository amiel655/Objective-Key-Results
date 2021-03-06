@extends('layouts.apps')

@section('content')

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Role Management</h2>
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

                                    <a href="{{ url('/admin/role/create') }}" class="btn btn-success btn-sm" title="Add New Role">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                    </a>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th><th>Name</th><th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($role as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration or $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                    
                                                        <a href="{{ url('/admin/role/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                        {!! Form::open([
                                                            'method'=>'DELETE',
                                                            'url' => ['/admin/role', $item->id],
                                                            'style' => 'display:inline'
                                                        ]) !!}
                                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                                    'type' => 'submit',
                                                                    'class' => 'btn btn-danger btn-sm',
                                                                    'title' => 'Delete Role',
                                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                            )) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>

                </tbody>
              </table>

            </div>
          </div>
        </div>

@endsection
