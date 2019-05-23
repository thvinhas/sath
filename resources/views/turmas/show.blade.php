@extends('layouts.app')

@section('title', __('turma.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('turma.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('turma.name') }}</td><td>{{ $turma->name }}</td></tr>
                        <tr><td>{{ __('turma.description') }}</td><td>{{ $turma->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $turma)
                    <a href="{{ route('turmas.edit', $turma) }}" id="edit-turma-{{ $turma->id }}" class="btn btn-warning">{{ __('turma.edit') }}</a>
                @endcan
                <a href="{{ route('turmas.index') }}" class="btn btn-link">{{ __('turma.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
