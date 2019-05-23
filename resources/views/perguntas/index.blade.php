@extends('layouts.app')

@section('title', __('perguntas.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Perguntas)
            <a href="{{ route('perguntas.create') }}" class="btn btn-success">{{ __('perguntas.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('perguntas.list') }} <small>{{ __('app.total') }} : {{ $perguntas->total() }} {{ __('perguntas.perguntas') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('perguntas.search') }}</label>
                        <input placeholder="{{ __('perguntas.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('perguntas.search') }}" class="btn btn-secondary">
                    <a href="{{ route('perguntas.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('perguntas.name') }}</th>
                        <th>{{ __('perguntas.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perguntas as $key => $perguntas)
                    <tr>
                        <td class="text-center">{{ $perguntas->firstItem() + $key }}</td>
                        <td>{!! $perguntas->name_link !!}</td>
                        <td>{{ $perguntas->description }}</td>
                        <td class="text-center">
                            @can('view', $perguntas)
                                <a href="{{ route('perguntas.show', $perguntas) }}" id="show-perguntas-{{ $perguntas->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $perguntas->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
