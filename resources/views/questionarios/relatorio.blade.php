@extends('layouts.app')

@section('title', __('questionario.list'))

@section('content')
<div class="mb-3">

<h1 class="page-title">Gráfico do questionário de {{$questionario->name}}</h1>
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
                          borderWidth: 3
                      }]
                  },
                  options: { maintainAspectRatio: false,
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true,
                                  suggestedMax: 10
                              }
                          }],
                          xAxes: [{
                            display: false, //this will remove all the x-axis grid lines
                          }]
                      }
                  }
              });
          });
        });


</script>
@endsection
