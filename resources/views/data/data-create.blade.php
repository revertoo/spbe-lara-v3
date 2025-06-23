@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
                <div class="breadcrumb-item">Add Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.data.store', $application->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <input type="hidden" class="form-control @error('application_id') is-invalid @enderror"
                                    name="application_id" value="{{ old('application_id', $application->id) }}" readonly
                                    autocomplete="application_id" placeholder="{{ __('ID Application') }}">
                                <input type="hidden" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" value="{{ old('user_id', auth()->user()->id) }}" required readonly
                                    autocomplete="user_id" placeholder="{{ __('ID User') }}">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Siapa yang menjadi Produsen Data pada sistem') }}</label>
                                    <input type="text"
                                        class="form-control @error('siapa_produsen_data') is-invalid @enderror"
                                        name="siapa_produsen_data" value="{{ old('siapa_produsen_data') }}"
                                        autocomplete="siapa_produsen_data"
                                        placeholder="{{ __('Siapa yang menjadi Produsen Data pada sistem') }}">
                                    <small id="siapa_produsen_data" class="form-text text-muted">
                                        Instansi Pusat, Instansi Daerah, Perseorangan, kelompok orang, atau badan hukum
                                    </small>
                                    @error('siapa_produsen_data')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Siapa Pengguna Data yang dihasilkan oleh sistem') }}</label>
                                    <input type="text"
                                        class="form-control @error('siapa_pengguna_data_yg_dihasilkan_sistem') is-invalid @enderror"
                                        name="siapa_pengguna_data_yg_dihasilkan_sistem"
                                        value="{{ old('siapa_pengguna_data_yg_dihasilkan_sistem') }}"
                                        autocomplete="siapa_pengguna_data_yg_dihasilkan_sistem"
                                        placeholder="{{ __('Siapa Pengguna Data Yang Dihasilkan Sistem') }}">
                                    <small id="siapa_pengguna_data_yg_dihasilkan_sistem" class="form-text text-muted">
                                        User yang menggunakan data pada sistem seperti Instansi Pusat, Instansi Daerah,
                                        Perseorangan, kelompok orang, atau badan hukum
                                    </small>
                                    @error('siapa_pengguna_data_yg_dihasilkan_sistem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Kapan Update Data Terakhir pada sistem') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control datepicker @error('kapan_update_data_terakhir') is-invalid @enderror"
                                            name="kapan_update_data_terakhir"
                                            value="{{ old('kapan_update_data_terakhir', optional($data->kapan_update_data_terakhir ?? null)->format('Y-m-d')) }}"
                                            autocomplete="kapan_update_data_terakhir"
                                            placeholder="{{ __('Kapan Update Data Terakhir pada sistem') }}">
                                        @error('kapan_update_data_terakhir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Apakah Data Sistem Menggunakan Kode Referensi') }}</label>
                                    <select
                                        class="form-control select2 @error('data_sistem_menggunakan_kode_referensi') is-invalid @enderror"
                                        name="data_sistem_menggunakan_kode_referensi"
                                        autocomplete="data_sistem_menggunakan_kode_referensi">
                                        <option value="">-</option>
                                        <option value="tidak-ada"
                                            {{ old('data_sistem_menggunakan_kode_referensi') == 'tidak-ada' ? 'selected' : '' }}>
                                            Tidak Ada
                                        </option>
                                        <option value="ada"
                                            {{ old('data_sistem_menggunakan_kode_referensi') == 'ada' ? 'selected' : '' }}>
                                            Ada
                                        </option>
                                    </select>
                                    <small id="data_sistem_menggunakan_kode_referensi" class="form-text text-muted">
                                        mengandung tanda berisi karakter yang menggambarkan makna, maksud, atau norma
                                        tertentu sebagai rujukan identitas Data yang bersifat unik. Contoh : kode referensi
                                        wilayah seperti kecamatan, desa dsb
                                    </small>
                                    @error('data_sistem_menggunakan_kode_referensi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Apakah pada aplikasi ini sudah memiliki kebijakan privasi terkait data-data yang diproses didalamnya') }}</label>
                                    <select
                                        class="form-control select2 @error('app_memiliki_kebijakan_privasi_terkait_data') is-invalid @enderror"
                                        name="app_memiliki_kebijakan_privasi_terkait_data"
                                        autocomplete="app_memiliki_kebijakan_privasi_terkait_data">
                                        <option value="">-</option>
                                        <option value="tidak-ada"
                                            {{ old('app_memiliki_kebijakan_privasi_terkait_data') == 'tidak-ada' ? 'selected' : '' }}>
                                            Tidak Ada
                                        </option>
                                        <option value="ada"
                                            {{ old('app_memiliki_kebijakan_privasi_terkait_data') == 'ada' ? 'selected' : '' }}>
                                            Ada
                                        </option>
                                    </select>
                                    jika belum agar mencantumkan kebijakan privasi, contoh :
                                    <a href="https://pengaduan.denpasarkota.go.id/id/Kebijakan-Privasi"
                                        target="_blank">https://pengaduan.denpasarkota.go.id/id/Kebijakan-Privasi</a>
                                    </small>
                                    @error('app_memiliki_kebijakan_privasi_terkait_data')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Siapa Melakukan Backup') }}</label>
                                    <select
                                        class="form-control select2 @error('siapa_melakukan_backup') is-invalid @enderror"
                                        name="siapa_melakukan_backup" autocomplete="siapa_melakukan_backup">
                                        <option value="">-</option>
                                        <option value="tidak-pernah-backup"
                                            {{ old('siapa_melakukan_backup') == 'tidak-pernah-backup' ? 'selected' : '' }}>
                                            Tidak Pernah Backup
                                        </option>
                                        <option value="mandiri"
                                            {{ old('siapa_melakukan_backup') == 'mandiri' ? 'selected' : '' }}>
                                            Mandiri
                                        </option>
                                        <option value="pihak-ketiga"
                                            {{ old('siapa_melakukan_backup') == 'pihak-ketiga' ? 'selected' : '' }}>
                                            Pihak Ketiga
                                        </option>
                                    </select>
                                    {{-- <small id="siapa_melakukan_backup" class="form-text text-muted">
                                        link video dari youtube maupun link lainnya
                                    </small> --}}
                                    @error('siapa_melakukan_backup')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label>{{ __('Periode Backup') }}</label>
                                    <select class="form-control select2 @error('periode_backup') is-invalid @enderror"
                                        name="periode_backup" autocomplete="periode_backup">
                                        <option value="">-</option>
                                        <option value="tidak-ada"
                                            {{ old('periode_backup') == 'tidak-ada' ? 'selected' : '' }}>
                                            Tidak ada
                                        </option>
                                        <option value="harian" {{ old('periode_backup') == 'harian' ? 'selected' : '' }}>
                                            Harian
                                        </option>
                                        <option value="mingguan"
                                            {{ old('periode_backup') == 'mingguan' ? 'selected' : '' }}>
                                            Mingguan
                                        </option>
                                        <option value="bulanan"
                                            {{ old('periode_backup') == 'bulanan' ? 'selected' : '' }}>
                                            Bulanan
                                        </option>
                                        <option value="semesteran"
                                            {{ old('periode_backup') == 'semesteran' ? 'selected' : '' }}>
                                            Semesteran
                                        </option>
                                        <option value="tahunan"
                                            {{ old('periode_backup') == 'tahunan' ? 'selected' : '' }}>
                                            Tahunan
                                        </option>
                                    </select>
                                    {{-- <small id="periode_backup" class="form-text text-muted">
                                        link video dari youtube maupun link lainnya
                                    </small> --}}
                                    @error('periode_backup')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Lokasi Penyimpanan Backup') }}</label>
                                    <select
                                        class="form-control select2 @error('lokasi_penyimpanan_backup') is-invalid @enderror"
                                        name="lokasi_penyimpanan_backup" autocomplete="lokasi_penyimpanan_backup">
                                        <option value="">-</option>
                                        <option value="tidak-ada"
                                            {{ old('lokasi_penyimpanan_backup') == 'tidak-ada' ? 'selected' : '' }}>
                                            Tidak ada
                                        </option>
                                        <option value="eksternal"
                                            {{ old('lokasi_penyimpanan_backup') == 'eksternal' ? 'selected' : '' }}>
                                            Penyimpanan eksternal (Harddisk/Flashdisk)
                                        </option>
                                        <option value="server-lain"
                                            {{ old('lokasi_penyimpanan_backup') == 'server-lain' ? 'selected' : '' }}>
                                            Server lain
                                        </option>
                                    </select>
                                    <small id="lokasi_penyimpanan_backup" class="form-text text-muted">
                                        Isi jika melakukan backup data. Lokasi ini merupakan tempat dimana menaruh hasil
                                        backup database sistem
                                    </small>
                                    @error('lokasi_penyimpanan_backup')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Kapan Terakhir Backup') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control datepicker @error('kapan_terakhir_backup') is-invalid @enderror"
                                            name="kapan_terakhir_backup"
                                            value="{{ old('kapan_terakhir_backup', optional($data->kapan_terakhir_backup ?? null)->format('Y-m-d')) }}"
                                            autocomplete="kapan_terakhir_backup"
                                            placeholder="{{ __('Kapan Terakhir Backup') }}">
                                        @error('kapan_terakhir_backup')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.application.show', $application->id) }}""
                                    class="btn btn-dark">{{ __('Back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
