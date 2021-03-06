@extends('layouts.app')

@section('title', __('semestre.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Semestre)
            <a href="{{ route('semestres.create') }}" class="btn btn-success">{{ __('semestre.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('semestre.list') }} <small>{{ __('app.total') }} : {{ $semestres->total() }} {{ __('semestre.semestre') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('semestre.search') }}</label>
                        <input placeholder="{{ __('semestre.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('semestre.search') }}" class="btn btn-secondary">
                    <a href="{{ route('semestres.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('semestre.name') }}</th>
                        <th>{{ __('semestre.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($semestres as $key => $semestre)
                    <tr>
                        <td class="text-center">{{ $semestres->firstItem() + $key }}</td>
                        <td>{!! $semestre->name_link !!}</td>
                        <td>{{ $semestre->description }}</td>
                        <td class="text-center">
                            @can('view', $semestre)
                                <a href="{{ route('semestres.show', $semestre) }}" id="show-semestre-{{ $semestre->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $semestres->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
