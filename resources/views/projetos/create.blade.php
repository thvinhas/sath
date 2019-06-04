@extends('layouts.app')

@section('title', __('projeto.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('projeto.create') }}</div>
            <form method="POST" action="{{ route('projetos.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('projeto.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('projeto.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="turma" class="form-label">Turma</label>
                        <select id="turma"  class="form-control{{ $errors->has('turma') ? ' is-invalid' : '' }}" name="turma_id" rows="4">
                            @foreach($turmas as $turma)
                              <option value="{{$turma->id}}">{{$turma->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('turma', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="aluno" class="form-label">Alunos</label>
                        <select id="aluno" multiple class="form-control{{ $errors->has('aluno') ? ' is-invalid' : '' }}" name="alunos[]" rows="4">
                            @foreach($alunos as $aluno)
                              <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('aluno', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="professor" class="form-label">Professores</label>
                        <select id="professor" multiple class="form-control{{ $errors->has('professor') ? ' is-invalid' : '' }}" name="professores[]" rows="4">
                            @foreach($professores as $professor)
                              <option value="{{$professor->id}}">{{$professor->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('professor', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('projeto.create') }}" class="btn btn-success">
                    <a href="{{ route('projetos.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
