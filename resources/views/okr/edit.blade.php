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
                        {!! Form::open(['action' => ['OKRController@update', $okr->okr_id], 'method' => 'POST']) !!}
                          <div class="form-group">
                                {{Form::label('title', 'Objective',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'objective'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('objective', $okr->objective,['id'=>'objective','required','class'=>'form-control col-md-7 col-xs-12'])}}
                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Date Received',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'date_received'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('date_received', $okr->date_received,['id'=>'date_received','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Days Ago',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'days_ago'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('days_ago', $okr->days_ago,['id'=>'days_ago','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Date Due',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'date_due'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('date_due', $okr->date_due,['id'=>'date_due','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Man Hours',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'man_hours'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('man_hours', $okr->date_received,['id'=>'man_hours','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Status',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'status'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('status', $okr->status,['id'=>'status','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Remarks',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'remarks'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('remarks', $okr->remarks,['id'=>'remarks','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div><br>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              {{Form::hidden('_method','PUT')}}
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