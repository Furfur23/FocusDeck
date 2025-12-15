@extends ('layouts/app')

@section ('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-sm-center justify-content-md-between justify-content-xl-between ">
        <div class="mb-1 mr-2">
            <a href="" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>
        <div>
            <a href="" class="btn btn-sm btn-success ">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="" class="btn btn-sm btn-danger ">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>Nomor</td>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="text-center">
                            <td class="text-center">1</td>
                            <td>Tiger Nixon</td>
                            <td class="text-center">
                                <span class="badge badge-dark badge-pill">Admin</span>
                            </td>
                            <td>masfur@gmailcom</td>
                            <td>
                              <span class="badge badge-danger badge-pill">Belum Ditugaskan</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                    <a href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection