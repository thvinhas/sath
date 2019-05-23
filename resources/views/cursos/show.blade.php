@extends('layouts.app')

@section('title', __('curso.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('curso.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('curso.name') }}</td><td>{{ $curso->name }}</td></tr>
                        <tr><td>{{ __('curso.description') }}</td><td>{{ $curso->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $curso)
                    <a href="{{ route('cursos.edit', $curso) }}" id="edit-curso-{{ $curso->id }}" class="btn btn-warning">{{ __('curso.edit') }}</a>
                @endcan
                <a href="{{ route('cursos.index') }}" class="btn btn-link">{{ __('curso.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
