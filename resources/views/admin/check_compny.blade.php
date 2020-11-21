@extends('admin.main')

@section('AdminMainContent')

@include('admin.include.header')


<style type="text/css">
  .required-field::before {
    content: "*";
    color: red;
}
.jsw_img{
    width: 24%;
    margin-left: 66%;
    margin-top: -64px;
}
.aceworth_img{
    margin-left: 10%;
    width: 26%;
    margin-top: 1%;
}
.biztech_img{
    padding-top: 16%;padding-left: 13%;
  }
  .biz_Img{
    width: 47%;
    margin-left: 25%;
    margin-top: 3%;
  }
  .address-text {
    margin-left: 24%;
    width: 58%;
    padding-top: 7%;
  }
  .submit_btn{
    text-align: center;
    margin-top: 2%;
    margin-bottom: 4%;

  }
  body
  { 
    background-image: url({{url('public/dist/img/background_cmp_img.jpg')}});
    background-repeat: no-repeat;
    background-size: cover;
  


  }
  .modal .modal-popout-bg {
    background-image: url({{url('public/dist/img/cool-background.png')}});

  }
  .modal_diloge{
    margin: 140px auto;
  }

  @media only screen and (max-width: 600px) {
    .modal_diloge{
        margin: 32px auto;
        width: 90%;
      }
    .jsw_img {
        width: 35%;
        margin-left: 64%;
        margin-top: -47px;
    }
    .aceworth_img {
      margin-left: 2%;
      width: 36%;
      margin-top: -2%;
    }
    .form-class{
      width: 73%;
      margin-left: 13%;
    }
    .form-submit-btn{
      margin-right: 10%;
    }
  }
</style>
 <!-- =========== Start : demo page ============= -->

      <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal_diloge" role="document" >
    <div class="modal-content modal-popout-bg" style="border-radius: 7px;">
      <!-- start : header logos -->
      <div class="modal-header">
        <!-- start : aceworth logos -->
        <div class="modal-title" id="exampleModalLabel">
          <img src="{{ URL::asset('public/dist/img/logo_new.png') }}" class="aceworth_img">
        </div>
         <!-- end : aceworth logos -->

         <!-- start : jsw logos -->
        <div class="modal-title" >
         <img src="{{ URL::asset('public/dist/img/jswlogo.png') }}" class="jsw_img">
        </div>
        <!-- end : jsw logos -->
      </div>
      <!-- end : header logos -->
      <div class="row">
        <!-- start : address and logo -->
       <div class="col-md-6">
         <img src="{{ URL::asset('public/dist/img/logo2_new.png') }}" class="biz_Img">
          <div class="address-text">
            <p class="paragraph">8 Shiv Pooja Apartment, Plot No. 360, Lane - 1, Khare Town, Dharampeth, Nagpur, Maharastra - 440010</p>
            <p><b>Phone:</b> 0712 - 2543272</p>
            <p><b>Email: </b>info@aceworth.in</p>
          </div>
       </div>
       <!-- end : address and logo -->

       <!-- start : form -->
        <div class="col-sm-6 form-class">
          <form action="{{ url('company-submit') }}" accept-charset="utf-8" class="form-horizontal" method="POST" >
            @csrf
          <div class="modal-body">
            <div>
              <label>Company name : <span class="required-field"><span></span></span></label>
              <select class="form-control" style="width: 100%" name="company_name">
                <option value="">select compny</option>
                <option value="C001-MVS LOGISTIC">C001-MVS LOGISTIC</option>
                <option value="C002-SILICA LOGISTIC">C002-SILICA LOGISTIC</option>
                <option value="C003-BIZTECH CONSULTANCY">C003-BIZTECH CONSULTANCY</option>
                <option value="C004-VIDHI INFRA">C004-VIDHI INFRA</option>
              </select>
              <small id="emailHelp" class="form-text text-muted">
                {!! $errors->first('company_name', '<p class="help-block" style="color:red;">:message</p>') !!}
              </small>
            </div>
            <div>&nbsp;</div>
            <div>
              <label>Account code : <span class="required-field"><span></span></span></label>
              <select class="form-control" style="width: 100%" name="macc_year">
                <option value="">--select year--</option>
                <option value="2018-2019">2018-2019</option>
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>
              </select>
              <small id="emailHelp" class="form-text text-muted">
                {!! $errors->first('macc_year', '<p class="help-block" style="color:red;">:message</p>') !!}
              </small>
            </div>

          </div>
          <div class="submit_btn form-submit-btn">           
            <button type="submit" class="btn btn-primary">
              Continue &nbsp;&nbsp;
              <i class="fa fa-sign-in" aria-hidden="true"></i>
            </button>
          </div>
          </form>
        </div>
        <!-- end : form -->
      </div>
    
    </div>
  </div>
</div>

 <!-- =========== End : demo page ============= -->


  <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('public/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('public/bootstrap/js/bootstrap.min.js') }}"></script>
     <!-- Select2 -->
    <script src="{{ URL::asset('public/plugins/select2/select2.full.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('public/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('public/dist/js/app.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::asset('public/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ URL::asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL::asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ URL::asset('public/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ URL::asset('public/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ URL::asset('public/dist/js/pages/dashboard2.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('public/dist/js/demo.js') }}"></script>
  </body>
</html>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModal').modal('show');
         console.log( "ready!" );
      $(".select2").select2();

    });

   
    $(document).ready(function() {
     
    });
</script>


@endsection