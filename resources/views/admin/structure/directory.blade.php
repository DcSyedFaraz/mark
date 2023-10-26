@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Directory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Directory</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('directory.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label>Voting Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="votingStatus" id="votingYes"
                                        value="Voting">
                                    <label class="form-check-label" for="votingYes">
                                        Voting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="votingStatus" id="votingNo"
                                        value="Non-Voting">
                                    <label class="form-check-label" for="votingNo">
                                        Non-Voting
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- /.container-fluid -->
        </section>
    </div>
@section('script')
    {{-- <script>
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
    </script> --}}
@endsection
@endsection
