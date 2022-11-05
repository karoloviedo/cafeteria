@extends('adminlte::page')

@section('title', 'Portal Dev\'s HKJ')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row mb-4">
        <div class="col-5 col-sm-5 col-md-4">
            <label for="">{{ __('Fecha Inicial') }}</label>
            <input type="date" name="start_date" id="start_date" class="form-control form-control-sm" style="max-width: 20rem;">
        </div>
        <div class="col-5 col-sm-5 col-md-4">
            <label for="">{{ __('Fecha Final') }}</label>
            <input type="date" name="end_date" id="end_date" class="form-control form-control-sm" style="max-width: 20rem;">
        </div>
        <div class="col-2 col-sm-2 col-md-2">
            <label for="" class="">{{ __('Search') }}</label><br>
            <button class="btn btn-sm btn-secondary"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><b>Total ventas</b></h5>
                    <p class="card-text">$ 10.957.900 COP</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><b>Total ventas pendientes</b></h5>
                    <p class="card-text">$ 8.601.450 COP</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><b>Total ventas canceladas</b></h5>
                    <p class="card-text">$ 2.356.450 COP</p>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-4 mb-3 font-weight-bold">Ventas Diarias</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');
        /* global Chart:false */

$(function () {
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
      type: 'bar',
      data: {
        labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
          },
          {
            backgroundColor: '#ced4da',
            borderColor: '#ced4da',
            data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,

              // Include a dollar sign in the ticks
              callback: function (value) {
                if (value >= 1000) {
                  value /= 1000
                  value += 'k'
                }

                return '$' + value
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })

    var $visitorsChart = $('#visitors-chart')
    // eslint-disable-next-line no-unused-vars
    var visitorsChart = new Chart($visitorsChart, {
      data: {
        labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
        datasets: [{
          type: 'line',
          data: [100, 120, 170, 167, 180, 177, 160],
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          pointBorderColor: '#007bff',
          pointBackgroundColor: '#007bff',
          fill: false
          // pointHoverBackgroundColor: '#007bff',
          // pointHoverBorderColor    : '#007bff'
        },
        {
          type: 'line',
          data: [60, 80, 70, 67, 80, 77, 100],
          backgroundColor: 'tansparent',
          borderColor: '#ced4da',
          pointBorderColor: '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill: false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
              suggestedMax: 200
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  })

  // lgtm [js/unused-local-variable]
</script>
@stop
