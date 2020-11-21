<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('public/dist/img/admin_img.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{strtoupper(Session::get('username'))}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview animated bounceInLeft">
              <a href="{{ url('/home/dashboard') }}">
                <i class="fa fa-dashboard"></i> 
                <span>Dashboard</span> 
              </a>
            </li>
            
            <li class="treeview animated bounceInRight">
              <a href="#">
                <i class="fa fa-folder" style="color:antiquewhite;"></i>
                 <span>Transaction</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php 

                $Fname = Session::get('form_name');

                if(isset($Fname)){

                foreach ($Fname as $row) {
                  
                  if('inward transaction' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>
                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Inward Transaction
                    </a>
                </li>

              <?php } else{} }  }?> 

              <?php if(Session::get('usertype')=='admin'){ ?>
                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Inward Transaction
                    </a>
                     <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-inward-trans') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Inward Trans
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-inward-trans') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Inward Trans
                      </a>
                    </li>
                  </ul>
                </li>

             <?php }else{} ?>

              <?php 

              if(isset($Fname)){

                $Fname = Session::get('form_name');

                foreach ($Fname as $row ) {
                  
                  if('outward transaction' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>

                 <li class="animated bounceInRight">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Outward Transaction
                    </a>
                    <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-outward-trans') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Outward Trans
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-outward-trans') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Outward Trans
                      </a>
                    </li>
                  </ul>
                </li>

               <?php } else{} }  }?> 

               <?php if(Session::get('usertype')=='admin'){ ?>
                 <li class="animated bounceInRight">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Outward Transaction
                    </a>
                </li>

             <?php } else{}?>



                <?php 
                if(isset($Fname)){

                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('sap bill' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>

                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Bills (Sap/Books)
                    </a>
                </li>
                 <?php } else{} }  }?> 

              <?php if(Session::get('usertype')=='admin'){ ?>
                 <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Bills (Sap/Books)
                    </a>
                    <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-sap-bill') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Bills
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-sap-bill') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Bills
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{}  ?>

 <?php if(Session::get('usertype')=='admin'){ ?>
                <li class="animated bounceInRight">
                  <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i> Fleet
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i>Fleet Transiction Form
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Fleet transiction
                      </a>
                    </li>
                     <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Submit Party Bill
                      </a>
                    </li>
                     <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i>  Party Bill Report
                      </a>
                    </li>
                    <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> TRPT Payment Advice Report
                      </a>
                    </li>
                    <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> TRPT Payment Report
                      </a>
                    </li>

                  </ul>
                </li>
                 <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Receipt Cash/Bank
                    </a>
                </li>
                <li class="animated bounceInRight">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Payment Cash/Bank
                    </a>
                </li>
                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Journal
                    </a>
                </li>
                <li class="animated bounceInRight">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Purchase
                    </a>
                </li>
                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Sales
                    </a>
                </li>
                <li class="animated bounceInRight">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Debit Note
                    </a>
                </li>
                <li class="animated bounceInLeft">
                    <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                   Credit Note
                    </a>
                </li>

                 <li class="animated bounceInRight">
                  <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>Non Accounting
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i>Purchase Order
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Sale Order
                      </a>
                    </li>
                     <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Good Receipt Note
                      </a>
                    </li>
                     <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i>  Dispatch/Delivery Note
                      </a>
                    </li>
                    <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> GRN Bills
                      </a>
                    </li>
                    <li class="animated bounceInRight">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Delivery Bills
                      </a>
                    </li>
                    <li class="animated bounceInLeft">
                      <a href="#"><i class="fa fa-circle-o text-aqua"></i> Qty only
                      </a>
                    </li>

                  </ul>
                </li>
              <?php } else{} ?>
              </ul>
            </li>
            <?php if(Session::get('usertype')=='admin'){ ?>
           <li class="treeview animated bounceInLeft">
              <a href="#">
                <i class="fa fa-folder" style="color:antiquewhite;"></i>
                 <span>Report/MIS </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="animated bounceInLeft">
                  <a href="{{ url('/rept-sap-despatch') }}">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    SAP Vs Dispach Report
                  </a>
                </li>
                <li class="animated bounceInRight">
                  <a href="{{ url( url('/rept-inward-sto-reg') )}}">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Inword  STO Register
                  </a>
                </li>
                <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Outword Despatch Register
                  </a>
                </li>
                <li class="animated bounceInRight">
                  <a href="{{ url('/rept-sap-list') }}">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Bill Register
                  </a>
                </li>
               
               
              </ul>
            </li>

          <?php } else{} ?>

            <li class="treeview animated bounceInLeft">
              <a href="#">
                <i class="fa fa-folder" style="color:antiquewhite;"></i>
                 <span>Master </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

                <?php 
                if(isset($Fname)){

                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master depot' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>
                <li class="animated bounceInLeft">
                  <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Depot
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-depot') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Depot
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-depot') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Depot
                      </a>
                    </li>
                  </ul>
                </li>
              <?php } else{} } }?>

              <?php if(Session::get('usertype')=='admin'){ ?>

                  <li class="animated bounceInLeft">
                  <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Depot
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-depot') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Depot
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-depot') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Depot
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

              <?php 
              if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master account' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>
                <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Dealer
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-dealer') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Dealer
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-dealer') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Dealer
                      </a>
                    </li>
                  </ul>
                </li>
                <?php } else{} } }?>
                  <?php if(Session::get('usertype')=='admin'){ ?>
                  <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Dealer
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-dealer') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Dealer
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-dealer') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Dealer
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>


                 <?php 
                 if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master area' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>

                <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Destination
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-destination') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Destination
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-destination') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Destination
                      </a>
                    </li>
                  </ul>
                </li>

                <?php } else{} } }?>

               <?php if(Session::get('usertype')=='admin'){ ?>
                   <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Destination
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-destination') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Destination
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-destination') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Destination
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

                 <?php 
                 if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master transporter' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

                ?>

                <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Transporter
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-transporter') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Transporter
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-transport') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Transporter
                      </a>
                    </li>
                  </ul>
                </li>
                 <?php } else{} } }?>

                <?php if(Session::get('usertype')=='admin'){ ?>
                  <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Transporter
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-transporter') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Transporter
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-transport') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Transporter
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

              <?php 
              if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master fleet' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>
                <li class="animated bounceInLeft">
                  <a href="pages/examples/invoice.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Fleet
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-fleet') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Fleet
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-fleet') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Fleet
                      </a>
                    </li>
                  </ul>
                </li>

                <?php } else{} } }?>

              <?php if(Session::get('usertype')=='admin'){ ?>

                  <li class="animated bounceInLeft">
                  <a href="pages/examples/invoice.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Fleet
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-fleet') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Fleet
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-fleet') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Fleet
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

              <?php 
              if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master rate' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>

                <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Rate
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-rate') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Rate
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-rate') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Rate
                      </a>
                    </li>
                  </ul>

                </li>

                <?php } else{} } }?>

            <?php if(Session::get('usertype')=='admin'){ ?>

                  <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Rate
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-rate') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Rate
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-rate') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Rate
                      </a>
                    </li>
                  </ul>

                </li>

             <?php } else{} ?>


              <?php 
 
                  if(Session::get('usertype')=='admin') { 

              ?>
                <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master User 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                    <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-user') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add User
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-user') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View User
                      </a>
                    </li>
                  </ul>
                </li>

              <?php  } else{} ?>


              <?php 
              if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master fy' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>

                <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Fy 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-fy') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Fy
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-fy') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Fy
                      </a>
                    </li>
                  </ul>

                </li>
                 <?php } else{} } }?>


             <?php if(Session::get('usertype')=='admin'){ ?>
                   <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Fy 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-fy') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Fy
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-fy') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Fy
                      </a>
                    </li>
                  </ul>

                </li>

             <?php } else{} ?>

              <?php 
               if(isset($Fname)){
                $Fname = Session::get('form_name');

                foreach ($Fname as $row) {
                  
                  if('master company' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>

                <li class="animated bounceInLeft">
                  <a href="pages/examples/invoice.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Company 
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>

                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-company') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Company
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-company') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Company
                      </a>
                    </li>
                  </ul>
                </li>

                 <?php } else{} } }?>

              <?php if(Session::get('usertype')=='admin'){ ?>
                   <li class="animated bounceInLeft">
                  <a href="pages/examples/invoice.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Company 
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>

                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-company') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Company
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-company') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Company
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

              <?php 
              if(isset($Fname)){
              $Fname = Session::get('form_name');

              foreach ($Fname as $row) {
                
                if('master um' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>
                <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Um 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-um') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Um
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-um') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Um
                      </a>
                    </li>
                  </ul>
                </li>

                <?php } else{} } }?>

               <?php if(Session::get('usertype')=='admin'){ ?>

                    <li class="animated bounceInRight">
                  <a href="pages/examples/profile.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Um 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-um') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Um
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-um') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Um
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

              <?php 
              if(isset($Fname)){
              $Fname = Session::get('form_name');

              foreach ($Fname as $row) {
                
                if('master item um' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>

                <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Item Um
                    <i class="fa fa-angle-left pull-right"></i> 
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-itemum') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Item Um
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-itemum') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Item Um
                      </a>
                    </li>
                  </ul>
                </li>
                <?php } else{} } }?>

                 <?php if(Session::get('usertype')=='admin'){ ?>
                    <li class="animated bounceInLeft">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Item Um
                    <i class="fa fa-angle-left pull-right"></i> 
                  </a>

                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-itemum') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Item Um
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-itemum') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Item Um
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

                 <?php 
                 if(isset($Fname)){
              $Fname = Session::get('form_name');

              foreach ($Fname as $row) {
                
                if('master item' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>
                <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Item 
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>

                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-item') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Item
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-item') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Item
                      </a>
                    </li>
                  </ul>
                </li>

                 <?php } else{} } }?>

                <?php if(Session::get('usertype')=='admin'){ ?>

                   <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Item 
                     <i class="fa fa-angle-left pull-right"></i>
                  </a>

                   <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-item') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Item
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-item') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Item
                      </a>
                    </li>
                  </ul>
                </li>

             <?php } else{} ?>

                <?php 
                if(isset($Fname)){
              $Fname = Session::get('form_name');

              foreach ($Fname as $row) {
                
                if('master account type' == $row &&  Session::get('usertype')=='superAdmin' || Session::get('usertype')=='user') { 

              ?>
                <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Account Type 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-account-type') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Account Type
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-account-type') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Account Type
                      </a>
                    </li>
                  </ul>
                </li>
                <?php } else{} } }?>
              <?php if(Session::get('usertype')=='admin'){ ?>

                  <li class="animated bounceInRight">
                  <a href="pages/examples/login.html">
                    <i class="fa fa-circle-o text-aqua"></i> 
                    Master Account Type 
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="animated bounceInLeft">
                      <a href="{{ url('/form-mast-account-type') }}">
                        <i class="fa fa-circle-o text-yellow"></i>
                        Add Account Type
                      </a>
                    </li>

                    <li class="animated bounceInRight">
                      <a href="{{ url('/view-mast-account-type') }}">
                        <i class="fa fa-circle-o text-red"></i> 
                        View Account Type
                      </a>
                    </li>
                  </ul>
                </li>
             <?php } else{} ?>
               
              </ul>
            </li>

            <?php 
 
                  if(Session::get('usertype')=='admin') { 

              ?>
            <li class="active treeview animated bounceInLeft">
              <a href="{{ url('/home/dashboard') }}">
                <i class="fa fa-dashboard"></i> 
                <span>Setting</span> 
              </a>
            </li>
          <?php } else{ } ?>

           <?php 
 
          if(Session::get('usertype')=='admin') { 

              ?>
            <li class="active treeview animated bounceInLeft">
              <a href="{{ url('/image') }}">
                <i class="fa fa-user"></i> 
                <span>multiple image</span> 
              </a>
            </li>
          <?php } else{ } ?>
            
           <!--  <li class="header">LABELS</li>
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-red"></i> 
                  <span>Important</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-yellow"></i> 
                <span>Warning</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-circle-o text-aqua"></i> 
                <span>Information</span>
              </a>
            </li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>