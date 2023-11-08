@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm6">
                <h1 class="m-0">Tambah Ticket</h1>
            </div>
            <!-- /.col -->
            <div class="row justify-content-md-end">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Ticket</a>
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
                        <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weightbold">Class</label>
                                    <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{old('class') }}" placeholder="Masukkan Nama Ticket">
                                    @error('class')
                                    <div class="invalid-feedback">
                                        X Class tidak boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Masukkan Price">
                                    @error('price')
                                    <div class="invalid-feedback">
                                        Price tidak boleh kosong !
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tipe" class="font-weight-bold">Movie</label>
                                    <select class="form-select @error('movie') is-invalid @enderror" name="movie" aria-label="Default select example">
                                        <option value="" selected>Pilih Movie</option>
                                        @forelse ($movie as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @empty
                                            <!-- Display an alert message if there are no movies -->
                                            <option value="" disabled>Data Movies belum tersedia</option>
                                        @endforelse
                                    </select>
                                    @error('movie')

                                    <div class="invalid-feedback">
                                        X Harus pilih salah satu movie !
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btnprimary">SIMPAN</button>
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
