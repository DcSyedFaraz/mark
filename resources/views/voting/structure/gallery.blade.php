@extends('voting.layouts.app')

<link rel="stylesheet" href="{{asset('admin/style.css')}}">
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f6f6f6;
            color: #444;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            line-height: 1;
        }

        .container {
            max-width: 1100px;
            padding: 0 20px;
            margin: 0 auto;
        }

        .panel {
            /* margin: 100px auto 40px; */
            max-width: 500px;
            /* text-align: center; */
        }

        .button_outer {
            background: #83ccd3;
            border-radius: 30px;
            text-align: center;
            height: 50px;
            width: 200px;
            display: inline-block;
            transition: .2s;
            position: relative;
            overflow: hidden;
        }

        .btn_upload {
            padding: 17px 30px 12px;
            color: #fff;
            text-align: center;
            position: relative;
            display: inline-block;
            overflow: hidden;
            z-index: 3;
            white-space: nowrap;
        }

        .btn_upload input {
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            width: 100%;
            height: 105%;
            cursor: pointer;
            opacity: 0;
        }

        .file_uploading {
            width: 100%;
            height: 10px;
            margin-top: 20px;
            background: #ccc;
        }

        .file_uploading .btn_upload {
            display: none;
        }

        .processing_bar {
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            border-radius: 30px;
            background: #83ccd3;
            transition: 3s;
        }

        .file_uploading .processing_bar {
            width: 100%;
        }

        .success_box {
            display: none;
            width: 50px;
            height: 50px;
            position: relative;
        }

        .success_box:before {
            content: '';
            display: block;
            width: 9px;
            height: 18px;
            border-bottom: 6px solid #fff;
            border-right: 6px solid #fff;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            left: 17px;
            top: 10px;
        }

        .file_uploaded .success_box {
            display: inline-block;
        }

        .file_uploaded {
            margin-top: 0;
            width: 50px;
            background: #83ccd3;
            height: 50px;
        }

        .uploaded_file_view {
            max-width: 300px;
            /* margin: 40px auto; */
            text-align: center;
            position: relative;
            transition: .2s;
            opacity: 0;
            border: 2px solid #ddd;
            padding: 15px;
        }

        .file_remove {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: block;
            position: absolute;
            background: #aaa;
            line-height: 30px;
            color: #fff;
            font-size: 12px;
            cursor: pointer;
            right: -15px;
            top: -15px;
        }

        .file_remove:hover {
            background: #222;
            transition: .2s;
        }

        .uploaded_file_view img {
            max-width: 100%;
        }

        .uploaded_file_view.show {
            opacity: 1;
        }

        .error_msg {
            text-align: center;
            color: #f00
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>Water System Manuals</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Photo Gallery</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main content -->
                <h1>Photo Gallery</h1>

                <!-- Add a disclaimer -->
                <p class="text-danger">*Disclaimer: If it is posted, it is considered public information.</p>
                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
                    Post
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" maxlength="96" name="caption" class="form-control w-50 my-2"
                                        placeholder="Caption(optional)" id="">
                                    <main class="main_full">
                                        <div class="panel">
                                            <div class="button_outer">
                                                <div class="btn_upload">
                                                    <input type="file" id="upload_file" name="photo" accept=".jpeg, .jpg, .png, .gif, .jfif">
                                                    Upload Image
                                                </div>
                                                <div class="processing_bar"></div>
                                                <div class="success_box"></div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="error_msg"></div>
                                            <div class="uploaded_file_view" id="uploaded_view">
                                                <span class="file_remove">X</span>
                                            </div>
                                        </div>
                                    </main>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Post</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    @foreach ($photos as $photo)
                    <div class="codepen-box border col-4">
                        <div class="top">
                            <div class="top-image">
                                <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->caption }}">
                            </div>
                            <div class="profile">
                                <div class="profile-info">
                                    <h3 class="name">{{ $photo->caption }}</h3>
                                    <p class="desc text-muted">{{ $photo->created_at->diffforhumans() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            @if (Auth::check() && (Auth::user()->id == $photo->user_id || Auth::user()->hasRole('Admin')))
                            <div class="bottom-item">
                                <form method="post" action="{{ route('photo.destroy', $photo->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger dltBtn" data-id="{{$photo->id}}"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            @endif

                        </div>
                    </div>
                        {{-- <div class="col-md-4 ">
                            <div class="card mb-4">
                                <img src="{{ asset('storage/' . $photo->path) }}" class="card-img-top"
                                    alt="{{ $photo->caption }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $photo->caption }}</h5><br>
                                    <small class="text-muted">{{ $photo->created_at->diffforhumans() }}</small>
                                    <br>
                                    @if (Auth::check() && (Auth::user()->id == $photo->user_id || Auth::user()->hasRole('Admin')))
                                        <form method="post" action="{{ route('photo.destroy', $photo->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@section('script')
    <script>
        var btnUpload = $("#upload_file"),
            btnOuter = $(".button_outer");
        btnUpload.on("change", function(e) {
            var ext = btnUpload.val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $(".error_msg").text("Not an Image...");
            } else {
                $(".error_msg").text("");
                btnOuter.addClass("file_uploading");
                setTimeout(function() {
                    btnOuter.addClass("file_uploaded");
                }, 3000);
                var uploadedFile = URL.createObjectURL(e.target.files[0]);
                setTimeout(function() {
                    $("#uploaded_view").append('<img src="' + uploadedFile + '" />').addClass("show");
                }, 3500);
            }
        });
        $(".file_remove").on("click", function(e) {
            $("#uploaded_view").removeClass("show");
            $("#uploaded_view").find("img").remove();
            btnOuter.removeClass("file_uploading");
            btnOuter.removeClass("file_uploaded");
        });
        $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
    </script>
@endsection
@endsection
