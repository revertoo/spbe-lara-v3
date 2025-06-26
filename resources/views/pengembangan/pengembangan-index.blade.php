<div class="table-responsive">
    <a href="{{ route('admin.pengembangan.create', $application->id) }}" class="btn btn-primary mb-3"><i
            class="fas fa-plus"></i> Add</a>
    <table class="table table-bordered table-hover" id="myTablePengembangan">
        <thead>
            <tr>
                <th>#</th>
                <th>Action</th>
                {{-- <th>Aplikasi</th> --}}
                <th>Tahun Pengembangan</th>
                <th>Video Penggunaan</th>
                <th>Platform</th>
                <th>Database</th>
                <th>Bahasa Program</th>
                <th>Framework</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengembangans as $pengembangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('admin.pengembangan.edit', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                        <form
                            action="{{ route('admin.pengembangan.destroy', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                        <!-- Tombol Detail (Trigger Modal) -->
                        <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#detailModal{{ $pengembangan->id }}" title="Detail">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    {{-- <td>{{ $pengembangan->app->nama_app }}</td> --}}
                    <td>{{ $pengembangan->tahun_pengembangan }}</td>
                    <td>
                        @if ($pengembangan->video_penggunaan)
                            <a href="{{ $pengembangan->video_penggunaan }}"
                                target="_blank">{{ $pengembangan->video_penggunaan }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $pengembangan->platform->kategori_platform }}</td>
                    <td>{{ $pengembangan->db->kategori_database }}</td>
                    <td>{{ $pengembangan->bahasaprogram->bhs_program }}</td>
                    <td>{{ $pengembangan->frameworkapp->framework_app }}</td>
                </tr>
            @empty
                {{-- <tr>
                    <td colspan="8">No data available in table</td>
                </tr> --}}
            @endforelse
        </tbody>
    </table>
</div>
@push('modals')
    @foreach ($pengembangans as $pengembangan)
        <!-- Modal Detail -->
        <div class="modal fade" id="detailModal{{ $pengembangan->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $pengembangan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pengembangan - {{ $pengembangan->tahun_pengembangan }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><strong>Tahun Pengembangan:</strong> {{ $pengembangan->tahun_pengembangan }}</div>
                        <div class="mb-3"><strong>Riwayat Pengembangan:</strong> {{ $pengembangan->riwayat_pengembangan }}</div>
                        <div class="mb-3"><strong>Fitur:</strong> {{ $pengembangan->fitur }}</div>
                        <div class="mb-3"><strong>Platform:</strong> {{ $pengembangan->platform->nama ?? '-' }}</div>
                        <div class="mb-3"><strong>Database:</strong> {{ $pengembangan->database->nama ?? '-' }}</div>
                        <div class="mb-3"><strong>Bahasa Pemrograman:</strong> {{ $pengembangan->bahasaprogram->nama ?? '-' }}</div>
                        <div class="mb-3"><strong>Framework:</strong> {{ $pengembangan->framework->nama ?? '-' }}</div>
                        <div class="mb-3">
                            <strong>Video Penggunaan:</strong><br>
                            @if($pengembangan->video_penggunaan)
                                <a href="{{ $pengembangan->video_penggunaan }}" target="_blank">{{ $pengembangan->video_penggunaan }}</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <strong>Dokumen Terkait:</strong>
                            <ul>
                                @foreach (['nda','doc_perancangan','surat_mohon','kak','sop','doc_pentest','doc_uat','buku_manual'] as $file)
                                    @if($pengembangan->$file)
                                        <li><a href="{{ asset('storage/'.$pengembangan->$file) }}" target="_blank">{{ strtoupper(str_replace('_',' ', $file)) }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="mb-3">
                            <strong>Capture Frontend:</strong><br>
                            @if ($pengembangan->capture_frontend)
                                <img src="{{ asset('storage/' . $pengembangan->capture_frontend) }}" alt="Frontend" class="img-fluid rounded" style="max-width: 300px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <strong>Capture Backend:</strong><br>
                            @if ($pengembangan->capture_backend)
                                <img src="{{ asset('storage/' . $pengembangan->capture_backend) }}" alt="Backend" class="img-fluid rounded" style="max-width: 300px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </div>
                        <div class="mb-3"><strong>Diinput Oleh:</strong> {{ $pengembangan->user->name ?? '-' }}</div>
                    </div>

                    <hr>
                        <ul class="nav nav-tabs px-3" id="tabDetail{{ $pengembangan->id }}" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="vendor-tab{{ $pengembangan->id }}" data-toggle="tab"
                                href="#vendor{{ $pengembangan->id }}" role="tab" aria-controls="vendor" aria-selected="true">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="staging1-tab" data-toggle="tab"
                                href="#staging1{{ $pengembangan->id }}" role="tab" aria-controls="staging1" aria-selected="false">Staging1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="staging2-tab" data-toggle="tab"
                                href="#staging2{{ $pengembangan->id }}" role="tab" aria-controls="staging2" aria-selected="false">Staging2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="staging3-tab" data-toggle="tab"
                                href="#staging3{{ $pengembangan->id }}" role="tab" aria-controls="staging3" aria-selected="false">Staging3</a>
                            </li>
                        </ul>
                    <div class="tab-content pt-3 px-3" id="tabContentDetail{{ $pengembangan->id }}">
                    
                    <div class="tab-pane fade show active" id="vendor{{ $pengembangan->id }}" role="tabpanel"
                        aria-labelledby="vendor-tab{{ $pengembangan->id }}">
                        <!-- TABEL VENDOR -->
                        <div class="table-responsive">

                            <a href="###" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i> Add Vendor
                            </a>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Nama Pengembang</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>No Kantor</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pengembangan->sdmpengembang as $i => $sdm)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td style="white-space: nowrap; text-align: center;">
                                                <a href="#"
                                                    class="btn btn-light btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="#"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $sdm->nama_pengembang }}</td>
                                            <td>{{ $sdm->alamat_pengembang }}</td>
                                            <td>{{ $sdm->nohp_pengembang }}</td>
                                            <td>{{ $sdm->nokantor_pengembang }}</td>
                                            <td>{{ $sdm->email_pengembang }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada data vendor</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="staging1{{ $pengembangan->id }}" role="tabpanel"
                        aria-labelledby="staging1-tab">
                        <p>Lorem ipsum dolor amet awikwok loerm ipsum dolor amet</p>
                    </div>

                    <div class="tab-pane fade" id="staging2{{ $pengembangan->id }}" role="tabpanel"
                        aria-labelledby="staging2-tab">
                        <p>Lorem ipsum dolor amet awikwok loerm ipsum dolor amet</p>
                    </div>

                    <div class="tab-pane fade" id="staging3{{ $pengembangan->id }}" role="tabpanel"
                        aria-labelledby="staging3-tab">
                        <p>Lorem ipsum dolor amet awikwok loerm ipsum dolor amet</p>
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush