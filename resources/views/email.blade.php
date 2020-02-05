{!! Form::open(['action' => 'EmailController@uploadDocument', 'files'=>true])!!}
{!! Form::file('document')!!}
{!!Form::submit('Sumbit')!!}