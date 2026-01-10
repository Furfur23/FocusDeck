@extends ('layouts/app')

@section ('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-waring text-white">
        <a href="{{ route('tugas') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('tugasStore') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="user_id"><span class="text-danger">*</span> Nama  :</label>
                        <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Pilih Nama </option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tugas"><span class="text-danger">*</span> Nama Tugas :</label>
                        <input type="text" class="form-control @error('tugas') is-invalid @enderror" id="tugas" name="tugas" value="{{ old('tugas') }}" placeholder="Misal: Meeting atau Ngoding" required>
                        @error('tugas') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_mulai"><span class="text-danger">*</span> Tanggal Mulai :</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                @error('tanggal_mulai') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_selesai"><span class="text-danger">*</span> Tanggal Selesai :</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                @error('tanggal_selesai') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-save mr-2"></i> Simpan Tugas
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection