<div class="table-responsive">
    <a href="{{ route('admin.data.create', $application->id) }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
        Add</a>
    <table class="table table-bordered table-hover" id="myTableKeamanan">
        <thead>
            <tr>
                <th>Action</th>
                <th>Siapa Produsen Data</th>
                <th>Siapa Pengguna Data Yang Dihasilkan Sistem</th>
                <th>Kapan Update Data Terakhir</th>
                <th>Apakah Data Sistem Menggunakan Kode Referensi</th>
                <th>App Memiliki Kebijakan Privasi Terkait Data</th>
                <th>Siapa Melakukan Backup</th>
                <th>Periode Backup</th>
                <th>Lokasi Penyimpanan Backup</th>
                <th>Kapan Terakhir Backup</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($datas as $data)
                <tr>
                    <td>
                        <a href="{{ route('admin.data.edit', ['application' => $application->id, 'data' => $data->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                        <form
                            action="{{ route('admin.data.destroy', ['application' => $application->id, 'data' => $data->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td>{{ $data->siapa_produsen_data }}</td>
                    <td>{{ $data->siapa_pengguna_data_yg_dihasilkan_sistem }}</td>
                    <td>{{ optional($data->kapan_update_data_terakhir)->translatedFormat('d F Y') ?? '-' }}</td>
                    <td>
                        @if ($data->data_sistem_menggunakan_kode_referensi)
                            {{ ucwords(str_replace('-', ' ', strtolower($data->data_sistem_menggunakan_kode_referensi))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($data->app_memiliki_kebijakan_privasi_terkait_data)
                            {{ ucwords(str_replace('-', ' ', strtolower($data->app_memiliki_kebijakan_privasi_terkait_data))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($data->siapa_melakukan_backup)
                            {{ ucwords(str_replace('-', ' ', strtolower($data->siapa_melakukan_backup))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($data->periode_backup)
                            {{ ucwords(str_replace('-', ' ', strtolower($data->periode_backup))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($data->lokasi_penyimpanan_backup)
                            {{ ucwords(str_replace('-', ' ', strtolower($data->lokasi_penyimpanan_backup))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ optional($data->kapan_terakhir_backup)->translatedFormat('d F Y') ?? '-' }}</td>
                    <td><span class="btn btn-sm btn-outline-dark">
                            {{ $data->updated_at->translatedFormat('d F Y') }}
                            oleh
                            {{ $data->user->name }}</span></td>
                </tr>
            @empty
                {{-- <tr>
                    <td colspan="5">No data available in table</td>
                </tr> --}}
            @endforelse
        </tbody>
    </table>
</div>
