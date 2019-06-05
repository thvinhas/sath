@extends('layouts.app')

@section('title', __('questionario.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('questionario.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('questionario.name') }}</td><td>{{ $questionario->name }}</td></tr>
                        <tr><td>{{ __('questionario.description') }}</td><td>{{ $questionario->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $questionario)
                    <a href="{{ route('questionarios.edit', $questionario) }}" id="edit-questionario-{{ $questionario->id }}" class="btn btn-warning">{{ __('questionario.edit') }}</a>
                @endcan
                <a href="{{ route('questionario.relatorio', ['id-questionario'=> $questionario->id]) }}" class="btn btn-link">Relatorio do questionario</a>
                <a href="{{ route('questionarios.index') }}" class="btn btn-link">{{ __('questionario.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
