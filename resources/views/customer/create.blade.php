@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm6">
                <h1 class="m-0">Tambah Customer</h1>
            </div>
            <!-- /.col -->
            <div class="row justify-content-md-end">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Customer</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Customer">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        X Name tidak boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}" placeholder="Masukkan Email Customer">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        X Email tidak boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">No Telephone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone') }}" placeholder="Masukkan No Telehone">
                                    @error('phone')
                                <div class="invalid-feedback">
                                    Phone tidak boleh kosong !
                                </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tipe" class="font-weight-bold">Ticket</label>
                                    <select class="form-select @error('id_ticket') is-invalid @enderror"
                                        aria-label="Default select example" name="id_ticket">
                                        <option selected disabled value>Pilih Ticket</option>
                                        @forelse ($ticket as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->movie->title . '  ('. $item->class . ':  ' . $item->price . ')' }}
                                        </option>
                                        @empty
                                        <div class="alert alert-danger">Data Movies belum tersedia</div>
                                        @endforelse
                                    </select>
                                    @error('id_ticket') <div class="invalid-feedback"> x Harus pilih salah satu ticket!
                                    </div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Quantity</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{old('quantity') }}" placeholder="Masukkan Quantity">
                                    @error('quantity')
                                <div class="invalid-feedback">
                                    Quantity tidak boleh kosong !
                                </div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
