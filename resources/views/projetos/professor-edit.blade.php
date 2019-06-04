@extends('layouts.app')

@section('title', __('projeto.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{$projeto->name}}</div>
            <form method="POST" action="{{ route('projetos.professorUpdate', $projeto) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                <input type="hidden" name="id_projeto" value="{{$projeto->id}}">
                    <div class="form-group">
                        <label for="nota" class="form-label">nota <span class="form-required">*</span></label>
                        <input id="nota" type="text" class="form-control{{ $errors->has('nota') ? ' is-invalid' : '' }}" name="nota" required>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('projeto.update') }}" class="btn btn-success">
                    <a href="{{ route('projetos.show', $projeto) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
