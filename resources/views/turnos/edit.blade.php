@extends('layouts.app')

@section('title', __('turno.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $turno)
        @can('delete', $turno)
            <div class="card">
                <div class="card-header">{{ __('turno.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('turno.name') }}</label>
                    <p>{{ $turno->name }}</p>
                    <label class="form-label text-primary">{{ __('turno.description') }}</label>
                    <p>{{ $turno->description }}</p>
                    {!! $errors->first('turno_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('turno.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('turnos.destroy', $turno) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="turno_id" type="hidden" value="{{ $turno->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('turno.edit') }}</div>
            <form method="POST" action="{{ route('turnos.update', $turno) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('turno.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $turno->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('turno.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $turno->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('turno.update') }}" class="btn btn-success">
                    <a href="{{ route('turnos.show', $turno) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $turno)
                        <a href="{{ route('turnos.edit', [$turno, 'action' => 'delete']) }}" id="del-turno-{{ $turno->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
