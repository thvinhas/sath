@extends('layouts.app')

@section('title', __('turno.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('turno.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('turno.name') }}</td><td>{{ $turno->name }}</td></tr>
                        <tr><td>{{ __('turno.description') }}</td><td>{{ $turno->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $turno)
                    <a href="{{ route('turnos.edit', $turno) }}" id="edit-turno-{{ $turno->id }}" class="btn btn-warning">{{ __('turno.edit') }}</a>
                @endcan
                <a href="{{ route('turnos.index') }}" class="btn btn-link">{{ __('turno.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
