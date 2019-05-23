@extends('layouts.app')

@section('title', __('semestre.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $semestre)
        @can('delete', $semestre)
            <div class="card">
                <div class="card-header">{{ __('semestre.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('semestre.name') }}</label>
                    <p>{{ $semestre->name }}</p>
                    <label class="form-label text-primary">{{ __('semestre.description') }}</label>
                    <p>{{ $semestre->description }}</p>
                    {!! $errors->first('semestre_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('semestre.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('semestres.destroy', $semestre) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="semestre_id" type="hidden" value="{{ $semestre->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('semestres.edit', $semestre) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('semestre.edit') }}</div>
            <form method="POST" action="{{ route('semestres.update', $semestre) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('semestre.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $semestre->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('semestre.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $semestre->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('semestre.update') }}" class="btn btn-success">
                    <a href="{{ route('semestres.show', $semestre) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $semestre)
                        <a href="{{ route('semestres.edit', [$semestre, 'action' => 'delete']) }}" id="del-semestre-{{ $semestre->id }}" class="btn btn-danger float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
