@extends('masterAdmin')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h1 style="text-align: center"><b><u>CATEGORY LIST</u></b></h1>
                    </div>
                    <div class="panel-body"><br>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-share"></i> Add
                        </button>
                        <!-- ====Modal Create Category==== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nm_category">Name</label>
                                                <input type="text" class="form-control @error('nm_category') is-invalid @enderror" id="nm_category"
                                                name="nm_category" value="{{ old('nm_category') }}">
                                                @error('nm_category')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                                <textarea class="form-control" name="desc" id="desc" rows="3" cols="20">{{ old('desc') }}</textarea>
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
                        <!-- ====END: Modal Create Category==== -->
                        <!-- ====Index Category==== -->
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
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category as $kategori)
                                    <tr>
                                        <td>{{ $kategori->nm_category }}</td>
                                        <td>{{ $kategori->desc == '' ? 'N/A' : $kategori->desc }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form action="{{ route('category.destroy', ['category' =>$kategori->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- ====Modal Update Category==== -->
                                    <div class="modal fade" id="update-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUpdateCategory" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelUpdateCategory">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form action="{{ route('category.update',['category' => $kategori->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nm_category">Name</label>
                                                            <input type="text" class="form-control @error('nm_category') is-invalid @enderror" id="nm_category"
                                                            name="nm_category" value="{{ old('nm_category') ?? $kategori->nm_category }}">
                                                            @error('nm_category')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="desc">Description</label>
                                                            <textarea class="form-control" name="desc" id="desc" rows="3" cols="20">{{ old('desc') ?? $kategori->desc }}</textarea>
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
                                    <!-- ====END: Modal Update Category==== -->
                                    @empty
                                        <td colspan="3" class="text-center">Empty Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- ====END: Index Category==== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('data-table')
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="DataTables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $('#provinsi').DataTable();
            });
        </script>
    @endsection
@endsection
