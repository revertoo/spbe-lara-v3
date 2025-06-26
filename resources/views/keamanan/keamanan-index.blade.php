<div class="table-responsive">
    <a href="{{ route('admin.keamanan.create', $application->id) }}" class="btn btn-primary mb-3"><i
            class="fas fa-plus"></i> Add</a>
    <table class="table table-bordered table-hover" id="myTableKeamanan">
        <thead>
            <tr>
                <th>Action</th>
                <th>Menerapkan Manajemen Kata Sandi</th>
                <th>Menerapkan Metode Hashing</th>
                <th>Menerapkan Enkripsi data</th>
                <th>Menerapkan SSL</th>
                <th>Menerapkan Captcha Login</th>
                <th>Menerapkan Token API</th>
                <th>Menerapkan Manajemen Sesi</th>
                <th>Notif User Login Bersama</th>
                <th>Menerapkan Fitur Log</th>
                <th>Menerapkan Size File</th>
                <th>Pernah Mengalami Serangan Cyber</th>
                <th>Penanganan Serangan Cyber</th>
                <th>Pernah Audit Keamanan</th>
                <th>Siapa Melakukan Audit Keamanan</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($keamanans as $keamanan) 
                <tr>
                    <td>
                        <a href="{{ route('admin.keamanan.edit', ['application' => $application->id, 'keamanan' => $keamanan->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                        <form
                            action="{{ route('admin.keamanan.destroy', ['application' => $application->id, 'keamanan' => $keamanan->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_manajemen_katasandi == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_metode_hashing == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_enkripsi_data == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_ssl == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_captcha_login == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_token_api == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_manajemen_sesi == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->notif_user_login_bersama == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_fitur_log == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->menerapkan_size_file == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td><i
                            class="{{ $keamanan->pernah_mengalami_serangan_cyber == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger' }}"></i>
                    </td>
                    <td>
                        @if ($keamanan->penanganan_serangan_cyber)
                            <a href="{{ asset(Storage::url($keamanan->penanganan_serangan_cyber)) }}"
                                target="_blank">View Dokumen
                                Penanganan Serangan Cyber</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ ucfirst($keamanan->pernah_audit_keamanan) }}</td>
                    <td>
                        @if ($keamanan->siapa_melakukan_audit_keamanan)
                            {{ ucwords(str_replace('-', ' ', strtolower($keamanan->siapa_melakukan_audit_keamanan))) }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td><span class="btn btn-sm btn-outline-dark">
                            {{ $keamanan->updated_at->translatedFormat('d F Y') }}
                            oleh
                            {{ $keamanan->user->name }}</span></td>
                </tr>
            @empty
                {{-- <tr>
                    <td colspan="5">No data available in table</td>
                </tr> --}}
            @endforelse
        </tbody>
    </table>
</div>
