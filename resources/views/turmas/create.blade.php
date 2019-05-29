@extends('layouts.app')

@section('title', __('turma.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('turma.create') }}</div>
            <form method="POST" action="{{ route('turmas.store') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('turma.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('turma.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="curso" class="form-label">Curso</label>
                        <select id="curso"  class="form-control{{ $errors->has('curso') ? ' is-invalid' : '' }}" name="curso_id" rows="4">
                            @foreach($cursos as $curso)
                              <option value="{{$curso->id}}">{{$curso->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('curso', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="semestre" class="form-label">Semestre</label>
                        <select id="semestre"  class="form-control{{ $errors->has('semestre') ? ' is-invalid' : '' }}" name="semestre_id" rows="4">
                            @foreach($semestres as $semestre)
                              <option value="{{$semestre->id}}">{{$semestre->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('semestre', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="turno" class="form-label">Turno</label>
                        <select id="turno"  class="form-control{{ $errors->has('turno') ? ' is-invalid' : '' }}" name="turno_id" rows="4">
                            @foreach($turnos as $turno)
                              <option value="{{$turno->id}}">{{$turno->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('turno', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="aluno" class="form-label">Alunos</label>
                        <select id="aluno" multiple class="form-control{{ $errors->has('aluno') ? ' is-invalid' : '' }}" name="aluno_id" rows="4">
                            @foreach($alunos as $aluno)
                              <option value="{{$aluno->id}}">{{$aluno->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('aluno', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('turma.create') }}" class="btn btn-success">
                    <a href="{{ route('turmas.index') }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
