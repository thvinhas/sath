@extends('layouts.app')

@section('title', __('semestre.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('semestre.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('semestre.name') }}</td><td>{{ $semestre->name }}</td></tr>
                        <tr><td>{{ __('semestre.description') }}</td><td>{{ $semestre->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $semestre)
                    <a href="{{ route('semestres.edit', $semestre) }}" id="edit-semestre-{{ $semestre->id }}" class="btn btn-warning">{{ __('semestre.edit') }}</a>
                @endcan
                <a href="{{ route('semestres.index') }}" class="btn btn-link">{{ __('semestre.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
