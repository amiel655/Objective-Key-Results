@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">

            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Form Design <small>different form elements</small></h2>
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
                        <br />
                                {!! Form::open(['action' => 'WeekController@store','id'=>'demo-form2', 'data-parsley-validate','class'=>'demo-form2' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                          <div class="form-group">
                                {{Form::label('title', 'Objective',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'objective'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::select('objective', $week ,null,['id'=>'objective','required','class'=>'form-control col-md-7 col-xs-12'])}}
                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                            
                                {{Form::label('title', 'Week Number',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'weeknum'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::number('weeknum', now()->weekOfYear,['id'=>'weeknum','required','min'=> 1 ,'max' => 52,'class'=>'form-control col-md-7 col-xs-12'])}}
                              <br><br><br>
                                {{Form::number('year', now()->year,['id'=>'year','required','class'=>'form-control col-md-7 col-xs-12'])}}
                            </div>
                         </div>
                         <br><br><br><br>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              {{Form::submit('Submit', ['class'=>'btn btn-success','id' => "add"])}}
                            </div>
                          </div>
    
                        </form>
                      </div>
                    </div>
                  </div>

            </div>
          </div>
          <!-- /page content -->
  
          <!-- footer content -->
          <footer>
            <div class="pull-right">
              Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>
@endsection