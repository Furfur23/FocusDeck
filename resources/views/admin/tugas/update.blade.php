@extends ('layouts/app')

@section ('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-warning text-white">
        <a href="{{ route('tugas') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('tugasUpdate', $tugas->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="tugas_id"><span class="text-danger">*</span> Nama :</label>
                        <input type="text" value="{{$tugas->user->nama}}"
                            class="form-control" disabled>

                    </div>

                    <div class="form-group">
                        <label for="tugas"><span class="text-danger">*</span>  Tugas :</label>
                        <textarea name="tugas" rows="5" class="form-control" @error('tugas') is-invalid @enderror>{{$tugas->tugas}}</textarea>
                        @error('tugas') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_mulai"><span class="text-danger">*</span> Tanggal Mulai :</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{$tugas->tanggal_mulai}}" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                @error('tanggal_mulai') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_selesai"><span class="text-danger">*</span> Tanggal Selesai :</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{$tugas->tanggal_selesai}}" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                @error('tanggal_selesai') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning mt-3">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection