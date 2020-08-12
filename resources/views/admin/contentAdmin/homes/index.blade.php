@extends('masterAdmin')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h1 style="text-align: center"><b><u>HOME VIEW</u></b></h1>
                    </div>
                    <div class="panel-body"><br>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-share"></i> Add
                        </button>
                        <!-- ====Modal Create View-Home==== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{ route('view-home.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                                name="title" value="{{ old('title') }}">
                                                @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="img_title">Image Title</label>
                                                <input type="file" name="img_title" id="img_title" class="form-control" required>
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
                        <!-- ====END: Modal Create View-Home==== -->
                        <!-- ====Index View-Home==== -->
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
                                        <th>Title</th>
                                        <th>Image Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($home as $rumah)
                                    <tr>
                                        <td>{{ $rumah->title }}</td>
                                        <td>
                                            <img src="{{ Storage::url($rumah->img_title) }}" alt="" style="width:150px;">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form action="{{ route('view-home.destroy', $rumah->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- ====Modal Update View-Home==== -->
                                    <div class="modal fade" id="update-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUpdateProduk" aria-hidden="true">
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
                                                    <form action="{{ route('view-home.update', $rumah->id) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                                            name="title" value="{{ old('title') ?? $rumah->title }}">
                                                            @error('title')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="img_title">Image Title</label>
                                                            <br>
                                                            <img src="{{ Storage::url($rumah->img_title) }}" alt="" style="width: 150px;">
                                                            <input type="file" name="img_title" id="img_title" class="form-control" value="{{ $rumah->img_title }}">
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
                                    <!-- ====END: Modal Update View-Home==== -->
                                    @empty
                                        <td colspan="3" class="text-center">Empty Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- ====END: Index View-Home==== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
