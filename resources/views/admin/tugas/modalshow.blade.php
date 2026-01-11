<div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="showModalLabel"><i class="fas fa-info-circle mr-2"></i>Detail Tugas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Nama </th>
                        <td>: {{ $item->user->nama }}</td>
                    </tr>
                    <tr>
                        <th>Tugas</th>
                        <td>: <span class="badge badge-primary">{{ $item->tugas }}</span></td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>: {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>: {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>