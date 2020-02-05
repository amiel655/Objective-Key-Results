<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    {!! Form::label('firstname', 'Firstname', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('firstname', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    {!! Form::label('lastname', 'Lastname', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('lastname', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
    {!! Form::label('department', 'Department', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('department', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '   <p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
    {!! Form::label('roles', 'Roles', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('roles[]', Spatie\Permission\Models\Role::get()->pluck('name','name'), isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'multiple'] : ['class' => 'form-control', 'multiple']) !!}
        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
