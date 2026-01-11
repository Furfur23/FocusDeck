@extends ('layouts/app')

@section ('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('user') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>
   
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('userStore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">
                            <span class="text-danger">*</span>
                            Nama Lengkap
                        </label>
                        <input type="text" class="form-control" id="nama" name="nama" @error('nama') is-invalid @enderror value="{{ old('nama') }}"placeholder="Masukkan Nama Lengkap" required>
                        @error('nama')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <span class="text-danger">*</span>
                            Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" @error('email') is-invalid @enderror value="{{ old('email') }}" placeholder="Masukkan Email" required>
                        @error('email')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">
                            <span class="text-danger">*</span>
                            Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" @error ('password') is-invalid @enderror value="{{ old('password') }}"placeholder="Masukkan Password" required>
                        @error('password')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">
                            <span class="text-danger">*</span>
                            Konfirmasi Password
                        </label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">
                            <span class="text-danger">*</span>
                            Jabatan
                        </label>
                        <select class="form-control" id="jabatan" name="jabatan" @error('jabatan') is-invalid @enderror value="{{ old('jabatan') }}" required>
                            <option value="" disabled selected>Pilih Jabatan</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                        @error('jabatan')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection