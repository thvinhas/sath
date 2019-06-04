@extends('layouts.app')

@section('title', __('questionario.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('questionario.create') }}</div>
            <form method="POST" action="{{ route('questionarios.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('questionario.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('questionario.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="turma" class="form-label">Turma</label>
                        <select id="turma"  class="form-control{{ $errors->has('turma') ? ' is-invalid' : '' }}" name="Turma_id" rows="4">
                            @foreach($turmas as $turma)
                              <option value="{{$turma->id}}">{{$turma->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('turma', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="pergunta" class="form-label">Pergunta</label>
                        <select id="pergunta" multiple class="form-control{{ $errors->has('pergunta') ? ' is-invalid' : '' }}" name="perguntas[]" rows="4">
                            @foreach($perguntas as $pergunta)
                              <option value="{{$pergunta->id}}">{{$pergunta->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('pergunta', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('questionario.create') }}" class="btn btn-success">
                    <a href="{{ route('questionarios.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
