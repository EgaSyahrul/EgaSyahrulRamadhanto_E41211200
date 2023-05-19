@extends('backend/layouts.template')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Tambah Pelanggan
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Show success or error message after form submission -->
                    @if(session('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- modal tambah --}}
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pelanggan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="budaya_form" method="POST"
                                    action="{{ route('budaya.store') }}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group mb-3">
                                            <label for="nama">Nama </label>
                                            <input type="text" class="form-control" name="nama" id="nama" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alamat">Alamat </label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                        </div>

                                       

                                        <div class="form-group mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                        </div>

                                    

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <h5 class="card-title">Pelanggan</h5>
                {{-- data Pelanggan --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($budayas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    {{ $item->alamat }}
                                </td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('budaya.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data Pelanggan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- // modal edit --}}
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form id="edit_budaya_form" method="POST"
                                            action="{{ route('budaya.update', $item->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama"
                                                        value="{{ $item->nama }}" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                                        value="{{ $item->alamat }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                                        value="{{ $item->tanggal_lahir }}" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                                        value="{{ $item->jenis_kelamin }}" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection
    <section class="section dashboard">
        <div class="row">
            <div class="card">

            </div>
        </div>
    </section>


</main>

@section('scripts')
<script>
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='pendidikan_form']").validate({
        // Specify validation rules
        rules: {
            nama: "required",
            alamat: "required",
            tanggal_lahir: "required",
            jenis_kelamin: "required",
        },

        // Specify validation error messages
        messages: {
            nama: "Mohon Isi Dengan Nama Lengkap Anda",
            alamat: "Mohon Isi Dengan Alamat Anda",
            tanggal_lahir: "Mohon Isi Dengan Tanggal Lahir Anda",
            jenis_kelamin: "Mohon Isi Dengan Jenis Kelamin Anda",
        },

        // Specify submit handler
        submitHandler: function (form) {
            // Submit the form via Ajax
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    // Show success message
                    $('#pendidikan_form')[0].reset();
                    $('.alert-success').fadeIn().html(response.message);
                },
                error: function (xhr) {
                    // Show error message
                    var errors = xhr.responseJSON.errors;
                    var errorString = '';
                    $.each(errors, function (key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    $('.alert-danger').fadeIn().html(errorString);
                }
            });
        }
    });
</script>
@endsection