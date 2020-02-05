@extends('layouts.apps')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit User</h2>
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
                <div class="container">
                    <div class="row">
            
                        <div class="col-md-9">
                            <div class="card">  
            
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
            
                                    {!! Form::model($user, [
                                        'method' => 'PATCH',
                                        'url' => ['/admin/user', $user->id],
                                        'class' => 'form-horizontal',
                                        'files' => true
                                    ]) !!}
                                       @include ('admin.user.form', ['submitButtonText' => 'Update'])
            
                                    {!! Form::close() !!}
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>



</div>
</div>
@endsection
