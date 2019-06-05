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
                        <tr><td>{{ __('turma.description') }}</td><td>{{ $turma->description }}</td></tr>
                        <tr><td>Curso:</td><td>{{ $turma->curso->name }}</td></tr>
                        <tr><td>Semestre</td><td>{{ $turma->semestre->name }}</td></tr>
                        <tr><td>Turno</td><td>{{ $turma->turno->name }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $turma)
                    <a href="{{ route('turmas.edit', $turma) }}" id="edit-turma-{{ $turma->id }}" class="btn btn-warning">{{ __('turma.edit') }}</a>
                @endcan
                <button onclick="gerarRelatrio()" class="btn btn-link" id="relatorio">relatorio de projetos</button>
                <a href="{{ route('turmas.index') }}" class="btn btn-link">{{ __('turma.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
function gerarRelatrio() {
            // e.preventDefault();
            jQuery.get( "{{ route('turma.relatorio', ['turma_id' => $turma->id]) }}" , function( data ) {
        var doc = new jsPDF();

        doc.setFontSize(22);	
        doc.text(20, 30, 'Relatorio de projetos da Turma {{$turma->name}}' );
        
        
        data = JSON.parse(data);
        var i = 1;   
        data.forEach(element => {
            console.log(element);
            var media;
            if(element.media == null) {
                media = 0;
            }else {
                media = element.media
            }
            doc.setFontSize(16);
            doc.text(20, 30 + (i * 10), "nome do Projeto "+ element.nome);
            i++;
            doc.setFontSize(10)
            doc.text(20, 30 + (i * 10), "Media " + media);
            i++;
            doc.text(20, 30 + (i * 10), "Professores: " + element.professor.join(', '));
            i++;
            doc.text(20, 30 + (i * 10), "Alunos: " + element.aluno.join(', '));
            i++;
           
        });
        doc.output('dataurlnewwindow');
        
       console.log(data);
    });
        }
   
    </script>
@endsection