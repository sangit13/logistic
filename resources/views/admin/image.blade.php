@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')

 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    
 <!-- =========== Start : demo page ============= -->

       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blank page
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Multiple Images</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
       
        <form method="post" action="{{ url('/dropzone/store') }}" enctype="multipart/form-data" files="true" class="dropzone" id="dropzone" >
        @csrf

      
        </form>
    
            </div><!-- /.box-body -->
            <!-- /.box-footer-->
          </div><!-- /.box -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><p style="color:green;font-weight: bold;">File has been successfully removed!!</p></center>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><p style="color:green;font-weight: bold;">File has been successfully uploaded!!</p></center>
      </div>
      
    </div>
  </div>
</div>
        </section><!-- /.content -->
      </div>

 <!-- =========== End : demo page ============= -->


@include('admin.include.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

<script type="text/javascript">
        Dropzone.options.dropzone =
        {

            maxFilesize: 10,
            /*renameFile: function (file) {

                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },*/
            acceptedFiles: ".jpeg,.jpg,.png,.gif",

              
            addRemoveLinks: true,
            timeout: 60000,

            removedfile: function(file) 
            {
                var name = file.name;
                
                $.ajax({
                   data: {
                      "_token": "{{ csrf_token() }}",
                      "filename": name
                      },
                    type: 'POST',
                    url: '{{ url("/dropzone/delete") }}',
                   
                    success: function (data){
                        
                        if(data==1){

                          $("#exampleModal").modal('show');
                        }
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                $("#exampleModal1").modal('show');
            },
            error: function (file, response) {
                return false;
            }
        };
    </script>
  
@endsection