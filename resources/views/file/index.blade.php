@extends('layouts/layoutMaster')

@section('title', 'File upload - Forms')

@section('vendor-style')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
@endsection

@section('page-script')
  <script type="text/javascript">
    Dropzone.options.dropzone =
      {
        url:"{{route('image.store')}}",
        method: "post",
        params:{ _token: "{{csrf_token()}}"},
        maxFilesize: 10,
        renameFile: function (file) {
          var dt = new Date();
          var time = dt.getTime();
          return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 60000,
        success: function (file, response) {
          console.log(response);
        },
        error: function (file, response) {
          return false;
        }
      };
  </script>
@endsection

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Forms /</span> File upload
  </h4>

  <div class="row">

    <!-- Multi  -->
    <div class="col-12">
      <div class="card">
        <h5 class="card-header">@yield('title')</h5>
        <div class="card-body">

          <div class="dropzone" id="dropzone">


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
