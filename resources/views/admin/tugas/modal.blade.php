<div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">Nama Karyawan</div>
                    <div class="col-6">: {{ $item->user->nama }}</div> {{-- Mengambil nama dari relasi user --}}

                    <div class="col-6">Tugas</div>
                    <div class="col-6">: 
                        <span class="badge badge-primary">{{ $item->tugas }}</span>
                    </div>

                    <div class="col-6">Tanggal Mulai</div>
                    <div class="col-6">: {{ $item->tanggal_mulai }}</div>

                    <div class="col-6">Tanggal Selesai</div>
                    <div class="col-6">: {{ $item->tanggal_selesai }}</div>
                </div>
                <div class="mt-3">
                    <p class="text-muted small">*Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
                {{-- Ganti route ke tugasDestroy --}}
                <form action="{{ route('tugasDestroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>