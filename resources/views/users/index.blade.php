@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Pemilih (Voter)</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <table class="display compact custom" cellspacing="0" id="users_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('script')
    <script type="text/javascript">
        $('#users_datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
                ajax: {
                url: "{{ route('users.index') }}",
                type: 'GET',
                },
                columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        { data: 'name', name: 'name' },
                        { data: 'nik', name: 'nik' },
                        { data: 'phone', name: 'phone' },
                        { data: 'address', name: 'address' },
                        { data: 'email', name: 'email' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false},
                    ],
                    "dom": '<"topcustom"lfr>t<"bottomcustom"ip>',
            order: [[0, 'desc']]
            });
    </script>
@endpush
@endsection
