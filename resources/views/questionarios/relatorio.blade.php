@extends('layouts.app')

@section('title', __('questionario.list'))

@section('content')
<div class="mb-3">

<h1 class="page-title">Relatorio do questionario {{$questionario->name}}</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

          <canvas id="myChart" width="400" height="400"></canvas>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var url = "{{route('questionario.getDados', ['questionarioId'=> $questionario->id])}}";
        var pergunta = new Array();
        var Labels = new Array();
        var resposta = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            // response = JSON.parse(response);
            console.log(response);
            Object.keys(response).forEach(function(key) {
              pergunta.push(response[key].nome);
                // Labels.push(data.stockName);
                resposta.push(response[key].resposta/response[key].qtd);
            });
            var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:pergunta,
                      datasets: [{
                          label: 'Resposta',
                          data: resposta,
                          borderWidth: 1
                      }]
                  },
                  options: { maintainAspectRatio: false,
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });


</script>
@endsection
