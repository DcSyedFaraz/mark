@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Physical Infrastructure Info</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Physical Infrastructure Info</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <div class="container">
                                    <div class="col-sm-12 col-lg-4 border">
                                        <form method="post" action="{{ route('plant.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" name="files[]" multiple onchange="enableButton()"
                                                        class="custom-file-input form-control" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="upload" value="upload" id="upload" disabled
                                                    class="btn btn-block btn-dark"><i class="fa fa-fw fa-upload"></i>
                                                    Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Uploaded</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($files)
                                            @foreach ($files as $key=> $file)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ asset('storage/' .$file->path) ?? '' }}" target="blank">{{ $file->name ?? '' }}</a></td>
                                                    <td>{{ $file->created_at->diffforhumans() ?? '' }}</td>


                                                    {{-- <td>{{ $file->deadline ?? '' }}</td> --}}

                                                    <td>
                                                        <a href="{{ route('structure.delete', $file->id) }}" data-id="{{$file->id}}"
                                                            class="btn btn-danger dltBtn"><i class="fas fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
    </div>
    @section('script')
    <script>
        function enableButton() {
    const fileInput = document.getElementById('customFile');
    const uploadButton = document.getElementById('upload');

    if (fileInput.files.length > 0) {
        uploadButton.removeAttribute('disabled');
    } else {
        uploadButton.setAttribute('disabled', 'disabled');
    }
}
        $(document).ready(function() {
            $('input[type="file"]').on("change", function() {
                let filenames = [];
                let files = this.files;
                if (files.length > 1) {
                    filenames.push("Total Files (" + files.length + ")");
                } else {
                    for (let i in files) {
                        if (files.hasOwnProperty(i)) {
                            filenames.push(files[i].name);
                        }
                    }
                }
                $(this)
                    .next(".custom-file-label")
                    .html(filenames.join(","));
            });
            $('.dltBtn').click(function(e) {
                e.preventDefault();
                var anchor = $(this);
                var dataID = anchor.data('id');
                //   var form=$(this).closest('form');
                //     var dataID=$(this).data('id');
                // alert(dataID);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // form.submit();
                            window.location.href = anchor.attr('href');
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        });
    </script>
    @endsection
@endsection
