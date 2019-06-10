@extends('layouts.app')

@section('title', __('perguntas.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $perguntas)
        @can('delete', $perguntas)
            <div class="card">
                <div class="card-header">{{ __('perguntas.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('perguntas.name') }}</label>
                    <p>{{ $perguntas->name }}</p>
                    <label class="form-label text-primary">{{ __('perguntas.description') }}</label>
                    <p>{{ $perguntas->description }}</p>
                    {!! $errors->first('perguntas_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('perguntas.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('perguntas.destroy', $perguntas->id) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="perguntas_id" type="hidden" value="{{ $perguntas->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('perguntas.edit', $perguntas) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('perguntas.edit') }}</div>
            <form method="POST" action="{{ route('perguntas.update', $perguntas->id) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('perguntas.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $perguntas->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('perguntas.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $perguntas->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('perguntas.update') }}" class="btn btn-success">
                    <a href="{{ route('perguntas.show', $perguntas) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $perguntas)
                        <a href="{{ route('perguntas.edit', [$perguntas->id, 'action' => 'delete']) }}" id="del-perguntas-{{ $perguntas->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
