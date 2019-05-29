@extends('layouts.app')

@section('title', __('questionario.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $questionario)
        @can('delete', $questionario)
            <div class="card">
                <div class="card-header">{{ __('questionario.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('questionario.name') }}</label>
                    <p>{{ $questionario->name }}</p>
                    <label class="form-label text-primary">{{ __('questionario.description') }}</label>
                    <p>{{ $questionario->description }}</p>
                    {!! $errors->first('questionario_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('questionario.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('questionarios.destroy', $questionario) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="questionario_id" type="hidden" value="{{ $questionario->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('questionarios.edit', $questionario) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('questionario.edit') }}</div>
            <form method="POST" action="{{ route('questionarios.update', $questionario) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('questionario.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $questionario->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('questionario.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $questionario->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('questionario.update') }}" class="btn btn-success">
                    <a href="{{ route('questionarios.show', $questionario) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $questionario)
                        <a href="{{ route('questionarios.edit', [$questionario, 'action' => 'delete']) }}" id="del-questionario-{{ $questionario->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
