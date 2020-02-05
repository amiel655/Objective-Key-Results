@extends('layouts.apps')

@section('content')


            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Create new task</h2>
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
                                {!! Form::open(['action' => 'OKRController@store','id'=>'demo-form2', 'data-parsley-validate','class'=>'demo-form2' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                        {{Form::label('title', 'Level',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'description'])}}
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {{Form::select('level', array('Level 1' => 'Level 1', 'Level 2' => 'Level 2', 'Level 3' => 'Level 3'), 'Level 1',['id'=>'objective','required','class'=>'form-control col-md-7 col-xs-12'])}}
         
                                    </div>
                                 </div>
                                  <br><br><br>
                          <div class="form-group">
                                {{Form::label('title', 'Objective',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'objective'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('objective', '',['id'=>'objective','required','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div><br><br><br>
                         {!! Form::open(['action' => 'OKRController@store','id'=>'demo-form2', 'data-parsley-validate','class'=>'demo-form2' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                         <div class="form-group">
                               {{Form::label('title', 'Description',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'description'])}}
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               {{Form::text('description', '',['id'=>'objective','required','class'=>'form-control col-md-7 col-xs-12'])}}

                           </div>
                        </div>
                         <br><br><br>
                         <div class="form-group">
                          {{Form::label('title', 'Date Recieved',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'date_recieved'])}}
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::date('date_recieved', '',['id'=>'date_recieved','class'=>'form-control col-md-7 col-xs-12'])}}
                      </div>
                   </div>
                   <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Date Due',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'date_due'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::date('date_due', '',['id'=>'date_due','class'=>'form-control col-md-7 col-xs-12'])}}
                            </div>
                         </div>
                         <br><br><br>
                         <div class="form-group">
                                {{Form::label('title', 'Man Hours',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'man_hours'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::number('man_hours', '',['id'=>'man_hours','class'=>'form-control col-md-7 col-xs-12'])}}

                            </div>
                         </div>
                         
                         <br><br><br>
                         <div class="form-group">
                          {{Form::label('title', 'Remarks',['class'=>'control-label col-md-3 col-sm-3 col-sm-3 col-xs-12', 'for'=>'remarks'])}}
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Form::textarea('remarks', '',['id'=>'remarks','maxlength' => 191,'class'=>'form-control col-md-7 col-xs-12'])}}

                      </div>
                         </div>
                         

                        

                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              {{Form::submit('Submit', ['class'=>'btn btn-success','id' => "add"])}}
                            </div>
                          </div>
    
                        </form>
                      </div>
                    </div>
                  </div>


@endsection