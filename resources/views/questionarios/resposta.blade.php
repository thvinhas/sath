@extends('layouts.app')

@section('title', __('questionario.create'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
        <div class="card-header">{{$questionario->name}}</div>
            <form method="POST" action="{{ route('questionario.respostas-salvar') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
            <input type="hidden" name="questionario" value="{{$questionario->id}}">
                <div class="card-body">
                    @foreach ($questionario->perguntas as $pergunta)
                    <div class="form-group">
                            <label for="name" class="form-label">{{ $pergunta->name }} <span class="form-required">*</span></label>
                            <input id="name" type="number" min="1" max="10" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name[{{$pergunta->id}}]" value="{{ old('name') }}" required>
                            {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    @endforeach
                <div class="card-footer">
                    <input type="submit" value="Salvar questionario" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
