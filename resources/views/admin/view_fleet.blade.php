@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')


  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Fleet 
            <small>View Details</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Fleet</a></li>
            <li class="active">View Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Fleet</h3>
                  <div class="box-tools pull-right">
          <a href="{{ url('/form-mast-fleet') }}" class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Fleet</a>
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
                        <th>Sr.NO</th>
                        <th>Truck No</th>
                        <th>Regd Date</th>
                        <th>Make Model</th>
                        <th>Location</th>
                        <th>Wheels Type</th>
                        <th>Load Capacity</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $sr_no=1; ?>
                      	@foreach($fleet_list as $key)
                      <tr> 
                      	

                        <td>{{ $sr_no }}</td>
                        <td>{{ $key->truck_no }}</td>
                        <td>{{ $key->regd_date }}</td>
                        <td>{{ $key->make_model }}</td>
                        <td>{{ $key->location }}</td>
                        <td>{{ $key->wheels_type }}</td>
                        <td>{{ $key->load_capacity }}</td>
                        
                        <td><a href="{{ url('/edit-fleet/'.$key->id) }}"><i class="fa fa-pencil btn btn-warning btn-sm" title="edit"></i></a> | <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fleetDelete_{{ $sr_no }}">
              <i class="fa fa-trash" title="delete"></i>
            </button></td>

                      </tr>
                      <?php $sr_no++; ?>
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

<?php $sr_no=1; ?>
@foreach($fleet_list as $key)

<div class="modal fade" id="fleetDelete_{{ $sr_no }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-sm" role="document">

    <div class="modal-content">

      <div class="modal-header">


        <h3 class="modal-title" id="exampleModalLabel">Are You Sure...!</h3>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      You Want To Delete This Fleet Data...!

      </div>

      <div class="modal-footer">

          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>

          <form action="{{ url('delete-fleet') }}" method="post">

            @csrf

            <input type="hidden" name="FleetID" id="FleetID" value="{{ $key->id }}">

            <input type="submit" value="Delete" style="margin-bottom: -15px;" class="btn btn-sm btn-danger">

          </form>

      </div>

    </div>

  </div>

</div>
 <?php $sr_no++; ?>
@endforeach

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
        { "width": "10%", "targets": 6 },
        { "width": "20%", "targets": 7 },
      ]

     });

});
</script>

<script type="text/javascript">
  function getId(id)
  {
    alert('hi');return false;
    $("#exampleModalDelete").modal('show');
    $("#DepotID").val(id);
  }
</script

@endsection

