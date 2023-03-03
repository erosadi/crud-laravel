@extends('layout.main')

@section('content')
<h3>Data Students</h3>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
            <i class="fas fa-plus-circle"></i> Add New Data
        </button>
    </div>
    <div class="card-body">
        <div class="alert alert-info">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('msg') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="" method="GET">
                <div class="row mb-3">
                    <label for="search" class="col-sm-2 col-form-label">Search Data</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" value="{{ $search }}" placeholder="Search.." name="search" autofocu>
                    </div>
                </div>
            </form>
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Students</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nomor = 1 + (($students->currentPage() - 1) *  $students->perPage());
                    @endphp
                    @foreach ( $students as $row )
                        <tr>
                            {{-- <th>{{ $loop->iteration }}</th> --}}
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $row->idstudents }}</td>
                            <td>{{ $row->fullname }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ ($row->gender=='M') ? 'Male' : 'Female' }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" type="button" class="btn btn-sm btn-warning" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline" action="{{ url('students/'.$row->idstudents) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $students->links() }} --}}
            {!! $students->appends(Request::except('page'))->render() !!}
        </div>
    </div>
</div>
<script>
    function deleteData(name){
        pesan = confirm(`Yakin Data Dengan Nama ${name} Ingin Dihapus ?`);
        if(pesan) return true;
        else return false;
    }
</script>
@endsection