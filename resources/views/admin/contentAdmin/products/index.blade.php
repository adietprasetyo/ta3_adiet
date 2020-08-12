@extends('masterAdmin')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h1 style="text-align: center"><b><u>PRODUCT LIST</u></b></h1>
                    </div>
                    <div class="panel-body"><br>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-share"></i> Add
                        </button>
                        <!-- ====Modal Create Produk==== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Name</label>
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" value="{{ old('nama') }}">
                                                @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach ($category as $kategori)
                                                        <option hidden value="">--Pilih--</option>
                                                        <option value="{{ $kategori->id }}">{{ $kategori->nm_category }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                                <label for="harga">Price</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1">Rp</span>
                                                </div>
                                                <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Budget" value="{{ old('harga') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi">Description</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" cols="20">{{ old('deskripsi') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="foto">Image</label>
                                                <input type="file" name="foto" id="foto" class="form-control" required oninvalid="this.setCustomValidity('Mohon di isi')">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- ====END: Modal Create Produk==== -->
                        <!-- ====Index Produk==== -->
                        @if (session()->has('pesan'))
                            <div class="alert alert-success alert-dismissible fade show mt-1 mb-0" role="alert">
                                {{ session()->get('pesan') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <br>
                            <table class="table table-striped table-bordered table-hover" id="provinsi">
                                <thead>
                                    <tr bgcolor="#f2f2f2">
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produk as $product)
                                    <tr>
                                        <td>{{ $product->nama }}</td>
                                        <td>Rp. {{ number_format($product->harga, 2, ',', '.') }}</td>
                                        <td>{{ $product->deskripsi == '' ? 'N/A' : $product->deskripsi }}</td>
                                        <td>
                                            <img src="{{ Storage::url($product->foto) }}" alt="" style="width:150px;">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#show-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-file"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form action="{{ route('produk.destroy', ['produk' =>$product->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- ====Modal Show Produk==== -->
                                    <div class="modal fade" id="show-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelShowProduk" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelShowProduk">Product {{ $product->nama }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-2"><strong>Category</strong></div>
                                                            <div class="col-md-2 ml-auto"><strong>:</strong></div>
                                                            <div class="col-md-8 ml-auto">{{ $product->category->nm_category }}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2"><strong>Price</strong></div>
                                                            <div class="col-md-2 ml-auto"><strong>:</strong></div>
                                                            <div class="col-md-8 ml-auto">Rp. {{ number_format($product->harga, 2, ',', '.') }}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2"><strong>Description</strong></div>
                                                            <div class="col-md-2 ml-auto"><strong>:</strong></div>
                                                            <div class="col-md-8 ml-auto"><p style="text-align: justify">{{ $product->deskripsi == '' ? 'N/A' : $product->deskripsi }}</p></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2"><strong>Image :</strong></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 ml-auto"><img src="{{ Storage::url($product->foto) }}" class="img-fluid" alt="" style="width:520px; height:350px;"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ====END: Modal Show Produk==== -->
                                    <!-- ====Modal Update Produk==== -->
                                    <div class="modal fade" id="update-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUpdateProduk" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelUpdateProduk">Update Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form action="{{ route('produk.update',['produk' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nama">Name</label>
                                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                            name="nama" value="{{ old('nama') ?? $product->nama }}">
                                                            @error('nama')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select name="category_id" id="category_id" class="form-control">
                                                                @foreach ($category as $kategori)
                                                                    <option value="{{ $kategori->id }}" {{ old('category_id') ?? $product->category->nm_category == $kategori->nm_category ? 'selected' : '' }}>{{ $kategori->nm_category }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                            <label for="harga">Price</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                                            </div>
                                                            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') ?? $product->harga }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="deskripsi">Description</label>
                                                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" cols="20">{{ old('deskripsi') ?? $product->deskripsi }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto">Image</label>
                                                            <br>
                                                            <img src="{{ Storage::url($product->foto) }}" alt="" style="width: 150px;">
                                                            <input type="file" name="foto" id="foto" class="form-control" value="{{ $product->foto }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- ====END: Modal Update Produk==== -->
                                    @empty
                                        <td colspan="5" class="text-center">Empty Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- ====END: Index Produk==== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
