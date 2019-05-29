@extends('layouts.app')

@section('title', __('turma.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $turma)
        @can('delete', $turma)
            <div class="card">
                <div class="card-header">{{ __('turma.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('turma.name') }}</label>
                    <p>{{ $turma->name }}</p>
                    <label class="form-label text-primary">{{ __('turma.description') }}</label>
                    <p>{{ $turma->description }}</p>
                    {!! $errors->first('turma_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('turma.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('turmas.destroy', $turma) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="turma_id" type="hidden" value="{{ $turma->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('turmas.edit', $turma) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('turma.edit') }}</div>
            <form method="POST" action="{{ route('turmas.update', $turma) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('turma.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $turma->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('turma.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $turma->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="curso" class="form-label">Curso</label>
                        <select id="curso"  class="form-control{{ $errors->has('curso') ? ' is-invalid' : '' }}" name="curso_id" rows="4">
                            @foreach($cursos as $curso)
                              <option value="{{$curso->id}}" {{($turma->curso_id == $curso->id) ? 'selected': ''}}>{{$curso->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('curso', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="semestre" class="form-label">Semestre</label>
                        <select id="semestre"  class="form-control{{ $errors->has('semestre') ? ' is-invalid' : '' }}" name="semestre_id" rows="4">
                            @foreach($semestres as $semestre)
                              <option value="{{$semestre->id}}" {{($turma->semestre_id == $semestre->id) ? 'selected': ''}}>{{$semestre->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('semestre', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label for="turno" class="form-label">Turno</label>
                        <select id="turno"  class="form-control{{ $errors->has('turno') ? ' is-invalid' : '' }}" name="turno_id" rows="4">
                            @foreach($turnos as $turno)
                              <option value="{{$turno->id}}" {{($turma->turno_id == $turno->id) ? 'selected': ''}}>{{$turno->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('turno', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('turma.update') }}" class="btn btn-success">
                    <a href="{{ route('turmas.show', $turma) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $turma)
                        <a href="{{ route('turmas.edit', [$turma, 'action' => 'delete']) }}" id="del-turma-{{ $turma->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
