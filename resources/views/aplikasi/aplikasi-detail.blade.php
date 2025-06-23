@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
                <div class="breadcrumb-item">Data Detail</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{ $application->nama_app }}
                                        @if ($application->status == 1)
                                            <span class="btn btn-success btn btn-sm">Aktif</span>
                                        @else
                                            <span class="btn btn-danger btn btn-sm">Tidak Aktif</span>
                                        @endif
                                    </h4>
                                    <p>{{ $application->opd->nama }}</p>
                                    <div><span><i class="fas fa-tag"></i>
                                            {{ $application->no_regis_app ? $application->no_regis_app : 'No Regis Tidak Ada' }}</span>
                                        &bull; <span><i class="fas fa-th"></i>
                                            {{ $application->katapp->kategori_aplikasi ? $application->katapp->kategori_aplikasi : 'Kategori Aplikasi Null' }}</span>
                                        &bull; <span><i class="fas fa-server"></i>
                                            {{ $application->katserver->kategori_server ? $application->katserver->kategori_server : 'Server Null' }}</span>
                                        &bull; <span><i class="fas fa-link"></i>
                                            @empty($application->url)
                                                {{ 'Url Tidak Ada' }}
                                            @else
                                                <a href="{{ $application->url }}" target="_blank">{{ $application->url }}</a>
                                            @endempty
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="detailApp-tab" data-toggle="tab" href="#detailApp"
                                        role="tab" aria-controls="detailApp" aria-selected="true">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pengembanganApp-tab" data-toggle="tab" href="#pengembanganApp"
                                        role="tab" aria-controls="pengembanganApp"
                                        aria-selected="false">Pengembangan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="interoperabilitas-tab" data-toggle="tab"
                                        href="#interoperabilitas" role="tab" aria-controls="interoperabilitas"
                                        aria-selected="false">Interoperabilitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tenagaKelola-tab" data-toggle="tab" href="#tenagaKelola"
                                        role="tab" aria-controls="tenagaKelola" aria-selected="false">Tenaga Teknis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="keamananApp-tab" data-toggle="tab" href="#keamananApp"
                                        role="tab" aria-controls="keamananApp" aria-selected="false">Keamanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="dataApp-tab" data-toggle="tab" href="#dataApp" role="tab"
                                        aria-controls="dataApp" aria-selected="false">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monevApp-tab" data-toggle="tab" href="#monevApp" role="tab"
                                        aria-controls="monevApp" aria-selected="false">Monev Aplikasi</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="detailApp" role="tabpanel"
                                    aria-labelledby="detailApp-tab">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm" id="">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25">Fungsi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->fungsi_app ? $application->fungsi_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Dasar Hukum</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($application->dasar_hukum)
                                                                <span class="btn btn-danger btn btn-sm">Dasar Hukum Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ asset(Storage::url($application->dasar_hukum)) }}"
                                                                    target="_blank">View Dokumen
                                                                    Dasar Hukum</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Tahun Pembuatan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->tahun_buat ? $application->tahun_buat : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Repositori</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($application->repositori)
                                                                <span class="btn btn-danger btn btn-sm">Repositori Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ $application->repositori }}"
                                                                    target="_blank">{{ $application->repositori }}</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Kategori Pengguna</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->katpengguna->kategori_pengguna }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Layanan</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->layananapp->layanan_app }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Aset Tak Berwujud</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($application->aset_takberwujud == 1)
                                                                <span class="btn btn-sm btn-info">Ya</span>
                                                            @else
                                                                <span class="btn btn-sm btn-info">Tidak</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Jaringan Intra</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($application->jaringan_intra == 1)
                                                                <span class="btn btn-sm btn-light">Internet</span>
                                                            @endif
                                                            @if ($application->jaringan_intra == 2)
                                                                <span class="btn btn-sm btn-light">Intranet</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if ($application->status == 0)
                                                        <tr>
                                                            <th class="w-25">Alasan Nonaktif</th>
                                                            <td>:</td>
                                                            <td class="w-75">{{ $application->alasan_nonaktif }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th class="w-25">Proses Bisnis</th>
                                                        <td>:</td>
                                                        <td class="w-75">{{ $application->proses_bisnis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Keterangan Proses Bisnis</th>
                                                        <td>:</td>
                                                        <td class="w-75">{{ $application->ket_probis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Data Diperbaharui</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            <span class="btn btn-sm btn-outline-dark">
                                                                {{ $application->updated_at->translatedFormat('d F Y') }}
                                                                oleh
                                                                {{ $application->user->name }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pengembanganApp" role="tabpanel"
                                    aria-labelledby="pengembanganApp-tab">
                                    @include('pengembangan.pengembangan-index')
                                </div>
                                <div class="tab-pane fade" id="monevApp" role="tabpanel"
                                    aria-labelledby="monevApp-tab">
                                    @include('monevapp.monevapp-index-detailapp')
                                </div>
                                <div class="tab-pane fade" id="tenagaKelola" role="tabpanel"
                                    aria-labelledby="tenagaKelola-tab">
                                    @include('sdmteknis.sdmteknis-index')
                                </div>
                                <div class="tab-pane fade" id="keamananApp" role="tabpanel"
                                    aria-labelledby="keamananApp-tab">
                                    @include('keamanan.keamanan-index')
                                </div>
                                <div class="tab-pane fade" id="interoperabilitas" role="tabpanel"
                                    aria-labelledby="interoperabilitas-tab">
                                    @include('interop.interop-index')
                                </div>
                                <div class="tab-pane fade" id="dataApp" role="tabpanel" aria-labelledby="dataApp-tab">
                                    @include('data.data-index')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.application.index') }}""
                                class="btn btn-dark">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: 'Apakah Anda yakin ingin menghapus data ini?',
                    text: "Jika Anda menghapus data ini, akan hilang selamanya.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#myTableMonev,#myTableKeamanan,#myTableTeknis,#myTableInterop,#myTablePengembangan").dataTable({
            "searching": false,
            "responsive": true,
            "lengthChange": false,
            "info": false,
            "paging": false,
        });
    </script>
@endpush
