@extends('layouts.app')

@section('title', __('projeto.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $projeto)
        @can('delete', $projeto)
            <div class="card">
                <div class="card-header">{{ __('projeto.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('projeto.name') }}</label>
                    <p>{{ $projeto->name }}</p>
                    <label class="form-label text-primary">{{ __('projeto.description') }}</label>
                    <p>{{ $projeto->description }}</p>
                    {!! $errors->first('projeto_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('projeto.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('projetos.destroy', $projeto) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="projeto_id" type="hidden" value="{{ $projeto->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('projetos.edit', $projeto) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('projeto.edit') }}</div>
            <form method="POST" action="{{ route('projetos.update', $projeto) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('projeto.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $projeto->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('projeto.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $projeto->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('projeto.update') }}" class="btn btn-success">
                    <a href="{{ route('projetos.show', $projeto) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $projeto)
                        <a href="{{ route('projetos.edit', [$projeto, 'action' => 'delete']) }}" id="del-projeto-{{ $projeto->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
