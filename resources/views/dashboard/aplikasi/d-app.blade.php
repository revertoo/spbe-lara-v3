@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="row d-flex align-items-stretch">
            @include('dashboard.aplikasi.total-dataApps')
            @include('dashboard.aplikasi.total-appDesa')
            @include('dashboard.aplikasi.total-appLain')
        </div>

        <div class="row d-flex align-items-stretch">
            @include('dashboard.aplikasi.app-tahun')

            @include('dashboard.aplikasi.app-kategori')
        </div>

        <div class="row">
            @include('dashboard.aplikasi.app-opd')
        </div>
    </section>
@endsection