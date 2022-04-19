@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="mt-3">
            <strong>Permissions:</strong>
            <br />
        </div>
        @foreach ($grouped_permissions as $key => $permission)
            <div class="col-md-4">

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="" id="select_{{ $key }}"
                            class="select-all-check parent-checkbox-{{ $key }}" data-id="{{ $key }}">
                        <strong>{{ $key }}</strong>
                    </label>
                    <br>
                    @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                class="name child-checkbox" data-id="{{ $key }}" checked={{ in_array($value->id, $rolePermissions) }}>
                            {{ $value->sub_title }} 
                        </label>
                        <br />
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    @include('roles.checkall-script')
@endsection
