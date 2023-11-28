@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
 
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Water System Manuals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Water System Manuals</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <div class="card-body">
            <div class="uplord-sec">
                <div class="right-sid0">
                    <div class="uplord">
                        <a class="nav-link collapsed" href="#">
                            <label for="fileInput" class="nav-link collapsed">
                                <i class="bi bi-cloud-upload-fill"></i>
                                <span>Upload</span>
                            </label>
                        </a>
                        <input type="file" name="files[]" multiple id="fileInput" style="display: none">
                    </div>
                </div>

                <div class="conten-sid">
                    <h3>Lorem Ipsum Dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum libero at felis pellentesque
                        tincidunt.</p>
                    <a href="#" id="submitBtn" disabled>Submit</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            {{-- <div class="container">
                                <div class="col-sm-12 col-lg-4 border">
                                    <form method="post" action="{{ route('structure.store') }}"
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
                            </div> --}}
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Uploaded</th>
                                            @can('delete_files')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($files)
                                            @foreach ($files as $key => $file)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><a href="{{ asset('storage/' . $file->path) ?? '' }}"
                                                            target="blank">{{ $file->name ?? '' }}</a></td>
                                                    <td>{{ $file->created_at->diffforhumans() ?? '' }}</td>


                                                    {{-- <td>{{ $file->deadline ?? '' }}</td> --}}
                                                    @can('delete_files')
                                                        <td>
                                                            <a href="{{ route('structure.delete', $file->id) }}"
                                                                data-id="{{ $file->id }}" class="btn btn-danger dltBtn"><i
                                                                    class="fas fa-trash"></i></a>

                                                        </td>
                                                    @endcan
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
@section('script')
    <script>
        function enableButton() {
            const fileInput = document.getElementById('fileInput');
            const uploadButton = document.getElementById('submitBtn');

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
    <script>
        $(document).ready(function() {
            // When the file input changes (files are selected)
            $('#fileInput').on('change', function(e) {
                var files = e.target.files;
                var alertText = "Selected files: ";
                for (var i = 0; i < files.length; i++) {
                    alertText += files[i].name + ", ";
                }
                alert(alertText);
                $('#submitBtn').attr('disabled', true);
            });

            // When the submit button is clicked
            $('#submitBtn').on('click', function() {
                const fileInputs = document.getElementById('fileInput');
                if (fileInputs.files.length === 0) {
                    toastr.error('Please select at least one file.');
                    return;
                }

                var fileInput = $('#fileInput')[0];
                var formData = new FormData();

                // Append all selected files to the formData
                for (var i = 0; i < fileInput.files.length; i++) {
                    formData.append('files[]', fileInput.files[i]);
                }

                // Add CSRF token to the formData
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route('structure.store') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Display success toast
                        toastr.success('Files uploaded successfully.');

                        // Disable the anchor tag

                        location.reload();

                        // Assuming response contains the new file data
                        // Update the table with the new file details (pseudo code)
                        // $('#fileTable').append('<tr><td>' + response.fileName + '</td><td>' + response.fileSize + '</td></tr>');
                    },
                    error: function(error) {
                        // Display error toast
                        toastr.error('Error uploading files.');
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
@endsection
