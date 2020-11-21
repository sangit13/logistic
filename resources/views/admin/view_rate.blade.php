@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')


  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Rate
            <small>View Details</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Rate</a></li>
            <li class="active">View Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Rate</h3>
                  <div class="box-tools pull-right">
          <a href="{{ url('/form-mast-rate') }}" class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Rate</a>
          </div>
                </div><!-- /.box-header -->
                 @if(Session::has('alert-success'))

              <div class="alert alert-success alert-dismissible" style="width: 96%;margin-left: 2%;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>
                  <i class="icon fa fa-check"></i>
                  Success...!
                </h4>
                 {!! session('alert-success') !!}
              </div>


            @endif


            @if(Session::has('alert-error'))

              <div class="alert alert-danger alert-dismissible" style="width: 96%;margin-left: 2%;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>
                  <i class="icon fa fa-ban"></i>
                  Error...!
                </h4>
                {!! session('alert-error') !!}
              </div>

            @endif

            
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Sr.NO</th>
                        <th class="text-center">Depot Code</th>
                        <th class="text-center">Area Code</th>
                        <th class="text-center">From Date</th>
                        <th class="text-center">To Date</th>
                        <th class="text-center">Rate</th>
                        <th class="text-center">Wheel Type</th>
                        <th class="text-center">Overload</th>
                        
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $sr_no=1; ?>
                      	@foreach($rate_list as $key)
                      <tr> 
                      	

                        <td align="center">{{ $sr_no++ }}</td>
                        <td align="center">{{ $key->depot_plant }}</td>
                        <td align="center">{{ $key->area_code }}</td>
                        <td align="center">{{ $key->from_date }}</td>
                        <td align="center">{{ $key->to_date }}</td>
                        <td align="center">{{ $key->rate }}</td>
                        <td align="center">{{ $key->wheel_type }}</td>
                        <td align="center">{{ $key->overload }}</td>
                     
                        
                        <td align="center"><a href="{{ url('/edit-rate/'.$key->id) }}"><i class="fa fa-pencil btn btn-warning btn-sm" title="edit"></i></a> | <a onclick="return getId(<?php echo $key->id; ?> )"><i class="fa fa-trash btn btn-danger btn-sm" title="delete"></i></a></td>

                      </tr>
                        @endforeach
                      
                    </tbody>
                    <!-- <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </tfoot> -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>



<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm" role="document">

    <div class="modal-content">

      <div class="modal-header">


        <h3 class="modal-title" id="exampleModalLabel">Are You Sure...!</h3>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      You Want To Delete This Item Data...!

      </div>

      <div class="modal-footer">

          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>

          <form action="{{ url('delete-itemum') }}" method="post">

            @csrf

            <input type="hidden" name="ItemumID" id="ItemumID" value="">

            <input type="submit" value="Delete" style="margin-bottom: -15px;" class="btn btn-sm btn-danger">

          </form>

      </div>

    </div>

  </div>

</div>
@include('admin.include.footer')

<script type="text/javascript">
    $(function() {
     $("#example").DataTable({
       "scrollX": true,
       "columnDefs": [
        { "width": "10%", "targets": 0 },
        { "width": "10%", "targets": 1 },
        { "width": "10%", "targets": 2 },
        { "width": "10%", "targets": 3 },
        { "width": "10%", "targets": 4 },
        { "width": "10%", "targets": 5 },
       
       
      ]
     });

});
</script>
<script type="text/javascript">
  function getId(id)
  {
    //alert(id);return false;
    $("#exampleModalDelete").modal('show');
    $("#ItemumID").val(id);
  }
</script>
@endsection

