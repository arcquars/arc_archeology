@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Integraciones')

@section('content_header')
    <h1>Integraciones</h1>
@stop

@section('content-aque')
    <h4>Servicios Conectados</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fab fa-cc-stripe"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Stripe</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fab fa-cc-paypal"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">PayPal</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-calendar"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Google Calendar</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h4>Otros Servicios Disponibles</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-file-excel"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Google Sheets</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Gmail</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
@endsection
