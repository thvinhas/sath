@extends('layouts.app')

@section('title', __('questionario.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Questionario)
            <a href="{{ route('questionarios.create') }}" class="btn btn-success">{{ __('questionario.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('questionario.list') }} <small>{{ __('app.total') }} : {{ $questionarios->total() }} {{ __('questionario.questionario') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('questionario.search') }}</label>
                        <input placeholder="{{ __('questionario.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('questionario.search') }}" class="btn btn-secondary">
                    <a href="{{ route('questionarios.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('questionario.name') }}</th>
                        <th>{{ __('questionario.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionarios as $key => $questionario)
                    <tr>
                        <td class="text-center">{{ $questionarios->firstItem() + $key }}</td>
                        <td>{!! $questionario->name_link !!}</td>
                        <td>{{ $questionario->description }}</td>
                        <td class="text-center">
                            @can('view', $questionario)
                                <a href="{{ route('questionarios.show', $questionario) }}" id="show-questionario-{{ $questionario->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $questionarios->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
