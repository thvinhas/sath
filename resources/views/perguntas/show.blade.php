@extends('layouts.app')

@section('title', __('perguntas.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('perguntas.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('perguntas.name') }}</td><td>{{ $perguntas->name }}</td></tr>
                        <!-- <tr><td>{{ __('perguntas.description') }}</td><td>{{ $perguntas->description }}</td></tr> -->
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $perguntas)
                    <a href="{{ route('perguntas.edit', $perguntas) }}" id="edit-perguntas-{{ $perguntas->id }}" class="btn btn-warning">{{ __('perguntas.edit') }}</a>
                @endcan
                <a href="{{ route('perguntas.index') }}" class="btn btn-link">{{ __('perguntas.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
