@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')

<style type="text/css">
  .defaultClass{
    display: none;
  }
  .shotable{
    display: block)
  }
</style>
  <div class="content-wrapper">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master User 
            <small>View Details</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master User</a></li>
            <li class="active">View Details</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View User</h3>
                  <div class="row">
                    <div class="col-md-4">
                    <label>From Date</label>
                    <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="from_date" id="from_date" class="form-control datepicker" placeholder="Enter From  Date">
                  </div>
                    </div>

                    <div class="col-md-4">
                   <label>To Date</label>
                   <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="to_date" id="to_date" class="form-control datepicker" placeholder="Enter To  Date">
                  </div>
                    </div>

                    <div class="col-md-4">
                      <label>Depot</label>
                    <select class="form-control" name="depot" id="depot">
                      <option value="">--Select Depot--</option>
                      @foreach($depot_list as $key)
                      <option value="{{ $key->depot_code }}">{{ $key->depot_code }}</option>
                      @endforeach
                    </select>
                    </div>
                  </div>
                  <div>&nbsp;</div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Account Code</label>
                    <select class="form-control" name="acc_code" id="acc_code">
                      <option value="">--Select Account--</option>
                      @foreach($dealer_list as $row)
                      <option value="{{ $row->acc_code }}">{{ $row->acc_code }}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="col-md-4">
                      <label>Transporter</label>
                    <select class="form-control" name="trans_code" id="trans_code">
                      <option value="">--Select Transporter--</option>
                      @foreach($transporter_list as $row)
                      <option value="{{ $row->code }}">{{ $row->code }}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 3%">
                      <label></label>
                     <button type='button' name='btnsearch' class='btn btn-success' id="btnsearch" value='btnsearch' onclick="return getData1();"> Search </button>
                   </div>
                 </div>
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

            
                <div class="box-body" style="overflow-x:auto;width: 100%;">
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="theadC">
                      <tr>
                        <th>Sr.NO</th>
                        <th>depot</th>
                        <th>party</th>
                        <th>date</th>
                        <th>challan no</th>
                        <th>destination</th>
                        <th>vehicle no</th>
                        <th>qty mt</th>
                        <th>qty bag</th>
                        <th>Transporter</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="hideClass">
                    	<?php $sr=1; ?>
                    @foreach($Alldata as $key)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{$key->depot_name}}</td>
                        <td>{{$key->party_name}}</td>
                        <td>{{$key->date}}</td>
                        <td>{{$key->challan_no}}</td>
                        <td>{{$key->destination}}</td>
                        <td>{{$key->vehicle_no}}</td>
                        <td>{{$key->qty_mt}}</td>
                        <td>{{$key->qty_mt}}</td>
                        <td>{{$key->transporter}}</td>
                        <td></td>
                      </tr>
                    @endforeach
                      
                    </tbody>
                  
                  </table>
                </div>

                <!-- /.box-body -->
<!-- TABLE -->
     <!--  <div class="box-body" style="overflow-x:auto;" id="tableshow">
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Sr.NO</th>
                        <th>depot</th>
                        <th>party</th>
                        <th>date</th>
                        <th>challan no</th>
                        <th>destination</th>
                        <th>vehicle no</th>
                        <th>qty mt</th>
                        <th>qty bag</th>
                        <th>Transporter</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      
                    </tbody>
                  
                  </table>
                </div> -->
<!--END  TABLE -->

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>



@include('admin.include.footer')

<script type="text/javascript">
    $(function() {
     $("#example").DataTable({
    
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
</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  function getData1()
  {  
    //alert('hi');
      var btnsearch = $("#btnsearch").val();
      var depot     = $("#depot").val();
      var party     =$("#acc_code").val();
      var from_date =$("#from_date").val();
      var to_date   =$("#to_date").val();
      var trans_code   =$("#trans_code").val();
     
     
      
     var datastring = "depot="+depot+"&party="+party+"&btnsearch="+btnsearch+"&from_date="+from_date+"&to_date="+to_date+"&trans_code="+trans_code;

           $.ajax({
                  type: "post",
                  url  : "{{URL('userData')}}",
                  data: datastring,
                   
                  success: function(html)
                  {
                      //alert(html);return false;
                    var result= jQuery.parseJSON(html);
                      
                    if(result!=0)
                    {
                      
                    $('#hideClass').addClass('defaultClass');

                    $(".theadC").after("<tbody></tbody>");
                    
                    $('#example').DataTable({
                      "bDestroy": true,
                        
                       'processing': false,
                                      
                      
                       "data": result.data,
                      
                 "columns" : [
     
                        { "id": "id" },
                        { "depot": "depot" },
                        { "party": "party" },
                        { "date": "date" },
                        { "challan_no": "challan_no" },
                        { "destination": "destination" },
                        { "vehicle_no": "vehicle_no" },
                        { "qty_mt": "qty_mt" },
                        { "qty_bag": "qty_bag" },
                        { "transporter": "transporter" },
                        
                   ],
                                    
              });
                }
                else
                {
                  
                  location.reload();
                      
                  }
                }

              }); 


  }

</script>
<script type="text/javascript">
  
  
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      orientation: 'bottom',
      todayHighlight: 'true',
      
    });
});
</script>

<!-- <script type="text/javascript">
 
    $(window).on('load',function(){
        $('#tableshow').css("display","none");
    });
</script> -->
@endsection

