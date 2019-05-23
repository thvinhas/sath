@extends('layouts.app')

@section('title', __('turma.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Turma)
            <a href="{{ route('turmas.create') }}" class="btn btn-success">{{ __('turma.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('turma.list') }} <small>{{ __('app.total') }} : {{ $turmas->total() }} {{ __('turma.turma') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('turma.search') }}</label>
                        <input placeholder="{{ __('turma.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('turma.search') }}" class="btn btn-secondary">
                    <a href="{{ route('turmas.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('turma.name') }}</th>
                        <th>{{ __('turma.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($turmas as $key => $turma)
                    <tr>
                        <td class="text-center">{{ $turmas->firstItem() + $key }}</td>
                        <td>{!! $turma->name_link !!}</td>
                        <td>{{ $turma->description }}</td>
                        <td class="text-center">
                            @can('view', $turma)
                                <a href="{{ route('turmas.show', $turma) }}" id="show-turma-{{ $turma->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $turmas->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
