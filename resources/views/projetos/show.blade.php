@extends('layouts.app')

@section('title', __('projeto.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('projeto.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('projeto.name') }}</td><td>{{ $projeto->name }}</td></tr>
                        <tr><td>{{ __('projeto.description') }}</td><td>{{ $projeto->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $projeto)
                    <a href="{{ route('projetos.edit', $projeto) }}" id="edit-projeto-{{ $projeto->id }}" class="btn btn-warning">{{ __('projeto.edit') }}</a>
                @endcan
                <a href="{{ route('projetos.index') }}" class="btn btn-link">{{ __('projeto.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
