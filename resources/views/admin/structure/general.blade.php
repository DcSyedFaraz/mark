@extends(auth()->user()->hasRole('member') ? 'voting.layouts.app' : 'admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')



    {{-- {{ Route::currentRouteName() }} --}}
    <!-- Main content -->
    <section class="content">

        <iframe src="/filemanager?type={{$file}}" id="filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    </section>
    @endsection

    @section('script')
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

                $('#submitBtn').on('click', function() {
                    const fileInputs = document.getElementById('fileInput');
                    if (fileInputs.files.length === 0) {
                        toastr.error('Please select at least one file.');
                        return;
                    }

                    var fileInput = $('#fileInput')[0];
                    var formData = new FormData();

                    for (var i = 0; i < fileInput.files.length; i++) {
                        formData.append('files[]', fileInput.files[i]);
                    }

                    formData.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '{{ route('plant.store') }}',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success('Files uploaded successfully.');


                            location.reload();

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
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    {{-- <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script> --}}
    {{-- <script>
        $(document).ready(function () {
            $('#filemanager').filemanager({
                defaultFolder: 'plant',
            });
        });
    </script> --}}
@endsection

