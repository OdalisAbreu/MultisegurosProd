
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Panel principal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!--<div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Default Panel
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>-->
                <!-- /.col-lg-4 -->
                <div class="col-lg-2" >
                    <a href="#" onClick="GetBalance();">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">
                            Balance Actual
                        </div>
                        <div class="panel-body">
                            <span id="balancemovil" class="text-xlarge strong separator bottom">$0.00</span>
                        </div>
                        
                    </div>
                    </a>
                </div>
                <script>
    function GetBalance(){
        $("#balancemovil").html('');
        CargarAjax2('incluidos/Balance/BalanceActual.php','','GET','balancemovil');
		
    }
	
	GetBalance();
  </script>
                <!-- /.col-lg-4 -->
                <!--<div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Success Panel
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
                </div>-->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            