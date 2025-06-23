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
                            @role('superadmin|admin-aplikasi')
                                <a href="{{ route('admin.subdomain.create') }}" class="btn btn-primary mb-3"><i
                                        class="fas fa-plus"></i> Add</a>
                            @endrole
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Operator Teknis</th>
                                            <th>Kontak Teknis</th>
                                            <th>Perangkat Daerah</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subdomains as $subdomain)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @role('superadmin|admin-aplikasi|operator-aplikasi')
                                                        <a href="{{ route('admin.subdomain.edit', $subdomain->id) }}"
                                                            class="btn btn-light btn-sm" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                    @endrole
                                                    @role('superadmin|admin-aplikasi')
                                                        <form action="{{ route('admin.subdomain.destroy', $subdomain->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-light btn-sm show_confirm"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @endrole
                                                </td>
                                                <td><a href="{{ $subdomain->url }}"
                                                        target="_blank">{{ $subdomain->url }}</a></td>
                                                <td>
                                                    @if ($subdomain->status == 1)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($subdomain->op_teknis)
                                                        {{ $subdomain->op_teknis }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($subdomain->kontak_teknis)
                                                        {{ $subdomain->kontak_teknis }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $subdomain->opd->nama }}</td>
                                                <td>
                                                    @if ($subdomain->keterangan)
                                                        {{ $subdomain->keterangan }}
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        $("#myTable").dataTable({
            "searching": true
        });
    </script>
@endpush
