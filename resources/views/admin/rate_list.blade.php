@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')

@include('admin.include.navbar')

@include('admin.include.sidebar')

<style type="text/css">
  .PageTitle{
    margin-right: 1px !important;
  }
 .required-field::before {
    content: "*";
    color: red;
  }
  .Custom-Box {
    /*border: 1px solid #e0dcdc;
    border-radius: 10px;
*/    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.12), 0 1px 2px 4px rgba(0,0,0,0.08);
  }
</style>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Rate
            <small>Update Details</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Master Rate</li>
          </ol>
        </section>
	<section class="content">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-8">
        <div class="box box-primary Custom-Box">
            <div class="box-header with-border" style="text-align: center;">
              <h2 class="box-title animated bounceInLeft PageTitle" style="font-weight: 800;color: #5696bb;">Update Rate </h2>
              
              
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
            <form action="{{ url('form-mast-rate-update') }}" method="POST" >
               @csrf
               <div class="row">
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Depot: 
                        <span class="required-field"></span>
                      </label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                          <input type="hidden" name="rateId" value="{{ $rate_list->id }}">
                          <select class="form-control" name="depot_code">
                            <option value="">--SELECT DEPOT--</option>
                            @foreach($depot_code as $key)
                            <option value="{{ $key->depot_code }}" <?php if($key->depot_code==$rate_list->depot_plant) {echo 'selected';} ?>>{{ $key->depot_code }} [{{$key->depot_name}}]</option>
                            @endforeach
                          </select>
                        </div>
                          <small id="emailHelp" class="form-text text-muted">
                            {!! $errors->first('depot_code', '<p class="help-block" style="color:red;">:message</p>') !!}
                          </small>

                    </div>
                    <!-- /.form-group -->
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                       Area Code : 
                        <span class="required-field"></span>
                      </label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                           <select class="form-control" name="destination_code">
                            <option value="">--SELECT DESTINATION--</option>
                            @foreach($destination_code as $key)
                            <option value="{{ $key->code }}" <?php if($key->code==$rate_list->area_code) {echo 'selected';} ?>>{{ $key->code }} [{{$key->name}}]</option>
                            @endforeach
                          </select>
                      </div>
                      <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('destination_code', '<p class="help-block" style="color:red;">:message</p>') !!}
                      </small>
                    </div>
                    <!-- /.form-group -->
                  </div>

                <!-- /.col -->
                
              </div>
              <!-- /.row -->

               <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Fy From Date : 
                        <span class="required-field"></span>
                      </label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control datepicker" name="fy_from_date" value="{{ $rate_list->from_date }}" placeholder="Enter From Date">
                      </div> 
                      <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('fy_from_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                      </small>
                    </div>
                    <!-- /.form-group -->
                  </div>
                
                 <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Fy To Date: 
                        <span class="required-field"></span>
                      </label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control datepicker" name="fy_to_date" value="{{ $rate_list->to_date }}" placeholder="Enter To Date">
                      </div> 
                      <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('fy_to_date', '<p class="help-block" style="color:red;">:message</p>') !!}
                      </small>
                    </div>
                    <!-- /.form-group -->
                  </div>
                
              </div>

              

              <div class="row">
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                       Rate : 
                        <span class="required-field"></span>
                      </label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                          <input type="text" class="form-control" name="rate" value="{{ $rate_list->rate }}" placeholder="Enter Rate">
                        </div>
                          <small id="emailHelp" class="form-text text-muted">
                            {!! $errors->first('rate', '<p class="help-block" style="color:red;">:message</p>') !!}
                          </small>

                    </div>
                    <!-- /.form-group -->
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Wheel Type : 
                        <span class="required-field"></span>
                      </label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-file"></i></span>
                    <input type="text" name="wheel_type" class="form-control" placeholder="Enter Wheel Type" value="{{ $rate_list->wheel_type }}">
                      </div>
                      <small id="emailHelp" class="form-text text-muted">
                        {!! $errors->first('wheel_type', '<p class="help-block" style="color:red;">:message</p>') !!}
                      </small>
                    </div>
                    <!-- /.form-group -->
                  </div>

                <!-- /.col -->
                
              </div>

              <div class="row">
                
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                       Overload : 
                        <span class="required-field"></span>
                      </label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                          <input type="text" name="overload" class="form-control" placeholder="Enter Overload" value="{{ $rate_list->overload }}">
                        </div>
                          <small id="emailHelp" class="form-text text-muted">
                            {!! $errors->first('overload', '<p class="help-block" style="color:red;">:message</p>') !!}
                          </small>

                    </div>
                    <!-- /.form-group -->
                  </div>

                
                
              </div>

              

              
              <div style="text-align: center;">
                 <button type="Submit" class="btn btn-primary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp; Update 
                 </button>
              </div>
            </form>
          </div><!-- /.box-body -->
           
          </div>
      </div>
      <div class="col-sm-3">
        <div class="box-tools pull-right">
          <a href="{{ url('/view-mast-rate') }}" class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-eye"></i>&nbsp;&nbsp;View Item</a>
        </div>
      </div>

    </div>
     
	</section>
</div>

@include('admin.include.footer')

<script type="text/javascript">
  
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      orientation: 'bottom',
      todayHighlight: 'true',
      /*startDate: 'today',*/
    });
});
</script>

@endsection