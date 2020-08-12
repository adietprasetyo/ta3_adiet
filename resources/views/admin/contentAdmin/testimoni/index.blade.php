@extends('masterAdmin')
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h1 style="text-align: center"><b><u>TESTIMONI</u></b></h1>
                    </div>
                    <div class="panel-body"><br>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-share"></i> Add
                        </button>
                        <!-- ====Modal Create Testimoni==== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="nm_tester">Name</label>
                                                <input type="text" class="form-control @error('nm_tester') is-invalid @enderror" id="nm_tester"
                                                name="nm_tester" value="{{ old('nm_tester') }}">
                                                @error('nm_tester')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <label for="phone">Phone</label>
                                            <div class="input-group mb-3">
                                                <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') }}">
                                            </div>

                                            <label for="email">Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="testimoni">Testimoni</label>
                                                <textarea class="form-control" name="testimoni" id="testimoni" rows="3" cols="20">{{ old('testimoni') }}</textarea>
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
                        <!-- ====END: Modal Create Testimoni==== -->
                        <!-- ====Index Testimoni==== -->
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
                                        <th>Testimoni</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimoni as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->nm_tester }}</td>
                                        <td>{{ $testimonial->phone }}</td>
                                        <td>{{ $testimonial->email }}</td>
                                        <td>{{ $testimonial->testimoni == '' ? 'N/A' : $testimonial->testimoni }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-{{ $loop->iteration }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form action="{{ route('testimoni.destroy', ['testimoni' =>$testimonial->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-1"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- ====Modal Update Testimoni==== -->
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
                                                    <form action="{{ route('testimoni.update',['testimoni' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="nm_tester">Name</label>
                                                            <input type="text" class="form-control @error('nm_tester') is-invalid @enderror" id="nm_tester"
                                                            name="nm_tester" value="{{ old('nm_tester') ?? $testimonial->nm_tester }}">
                                                            @error('nm_tester')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <label for="phone">Phone</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') ?? $testimonial->phone }}">
                                                        </div>

                                                        <label for="email">Email</label>
                                                        <div class="input-group mb-3">
                                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') ?? $testimonial->email }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="testimoni">Testimoni</label>
                                                            <textarea class="form-control" name="testimoni" id="testimoni" rows="3" cols="20">{{ old('testimoni') ?? $testimonial->testimoni }}</textarea>
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
                                    <!-- ====END: Modal Update Testimoni==== -->
                                    @empty
                                        <td colspan="5" class="text-center">Empty Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- ====END: Index Testimoni==== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
