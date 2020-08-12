@extends('masterAdmin')
@section('content')

{{-- @section('ckeditor')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection --}}

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h1 style="text-align: center"><b><u>CONTACT CLIENT</u></b></h1>
                    </div>
                    <div class="panel-body"><br>
                        {{-- <div class="py-4 d-flex justify-content-end align-items-center">
                            <a href="{{ url('admin/produk/create') }}" class="btn btn-primary"><i class="fa fa-share-square-o"></i> Add Data</a>
                        </div> --}}

                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-share"></i> Add
                        </button> --}}
                        <!-- ====Modal Create About==== -->
                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="deskripsi_ab">Description</label>
                                                <textarea class="form-control" name="ckeditor_deskripsi_ab" id="deskripsi_ab" rows="3" cols="20">{{ old('deskripsi_ab') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="foto_ab">Image</label>
                                                <input type="file" name="foto_ab" id="foto_ab" class="form-control" required oninvalid="this.setCustomValidity('Mohon di isi')">
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
                        </div> --}}
                        <!-- ====END: Modal Create About==== -->
                        <!-- ====Index About==== -->
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contact as $kontak)
                                    <tr>
                                        <td>{{ $kontak->nm_kontak }}</td>
                                        <td>{{ $kontak->phone }}</td>
                                        <td>{{ $kontak->email }}</td>
                                        <td>{{ $kontak->desc_kontak == '' ? 'N/A' : $kontak->desc_kontak }}</td>
                                        <td>
                                            <div class="d-flex">
                                                {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button> --}}
                                                <form action="{{ route('contact.destroy', ['contact' =>$kontak->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- ====Modal Update About==== -->
                                    {{-- <div class="modal fade" id="update-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUpdateProduk" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelUpdateProduk">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form action="{{ route('about.update',['about' => $abouts->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="deskripsi_ab">Description</label>
                                                            <textarea class="form-control" name="deskripsi_ab" id="deskripsi_ab" rows="3" cols="20">{{ old('deskripsi_ab') ?? $abouts->deskripsi_ab }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto_ab">Image</label>
                                                            <br>
                                                            <img src="{{ Storage::url($abouts->foto_ab) }}" alt="" style="width: 150px;">
                                                            <input type="file" name="foto_ab" id="foto_ab" class="form-control" value="{{ $abouts->foto_ab }}">
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
                                    </div> --}}
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
    {{-- <script>
        CKEDITOR.replace( 'deskripsi_ab' );
    </script> --}}
@endsection
