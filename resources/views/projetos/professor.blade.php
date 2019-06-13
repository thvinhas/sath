@extends('layouts.app')

@section('title', __('projeto.list'))

@section('content')
<div class="mb-3">
    <h1 class="page-title">Projetos </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('projeto.name') }}</th>
                        <th>{{ __('projeto.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projetos as $key => $projeto)
                    <tr>
                        <td class="text-center">{{ $key }}</td>
                        <td>{{ $projeto->name }}</td>
                        <td>{{ $projeto->description }}</td>
                        <td class="text-center">
                            @can('view', $projeto)
                                <a href="{{ route('projetos.professorEdit', ['id' => $projeto->id]) }}" id="show-projeto-{{ $projeto->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="card-body">{{ $projetos->appends(Request::except('page'))->render() }}</div> --}}
        </div>
    </div>
</div>
@endsection
