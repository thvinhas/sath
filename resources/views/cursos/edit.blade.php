@extends('layouts.app')

@section('title', __('curso.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $curso)
        @can('delete', $curso)
            <div class="card">
                <div class="card-header">{{ __('curso.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('curso.name') }}</label>
                    <p>{{ $curso->name }}</p>
                    <label class="form-label text-primary">{{ __('curso.description') }}</label>
                    <p>{{ $curso->description }}</p>
                    {!! $errors->first('curso_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('curso.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('cursos.destroy', $curso) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="curso_id" type="hidden" value="{{ $curso->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('curso.edit') }}</div>
            <form method="POST" action="{{ route('cursos.update', $curso) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('curso.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $curso->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('curso.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $curso->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('curso.update') }}" class="btn btn-success">
                    <a href="{{ route('cursos.show', $curso) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $curso)
                        <a href="{{ route('cursos.edit', [$curso, 'action' => 'delete']) }}" id="del-curso-{{ $curso->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
