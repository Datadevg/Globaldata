<div class="page-content header-clear-medium">
        
        <div class="card card-style">
            <div class="content">
                <div class="text-center"> <img src="../../assets/img/favicon.png" style="border-radius:5rem; width:45px; height:45px; margin-right:10px;"></div>
                <p class="mb-0 font-600 text-black text-center">Vtu Telecom Transaction Receipt</p>
                <h3 class="text-center"><b class='text-success'><?php echo $controller->formatStatus($data->status); ?></b></h3>
                <hr/>
                <table class="table">
                    <tr>
                        <td><b>Ref No:</b></td>
                        <td align="right"><?php echo $data->transref; ?></td>
                    </tr>
                    <tr>
                        <td><b>Date:</b></td>
                        <td align="right">04 Feb 2024 07:52PM</td>
                    </tr>
                    <tr>
                        <td><b>Service:</b></td>
                        <td align="right"><?php echo $data->servicename; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description:</b></td>
                        <td align="right"><?php echo $data->servicedesc; ?></td>
                    </tr>
                    <?php if(!isset($_GET["receipt"])): ?>
                    <tr>                   
                        <td><b>Amount:</b></td>
                        <td align="right">N<?php echo $data->amount; ?></td>
                    </tr>
                    <tr>
                        <td><b>Old Balance:</b></td>
                        <td align="right">N<?php echo $data->oldbal; ?></td>
                    </tr>
                     <tr>
                        <td><b>New Balance:</b></td>
                        <td align="right">N<?php echo $data->newbal; ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>                  
                    

                </table>
                <div class="text-center">
                <?php if(!isset($_GET["receipt"])): ?>
                <a href="transaction-details?receipt&ref=<?php echo $_GET["ref"]; ?>" class="gradient-highlight btn-sm" >
                    <b>View User Receipt</b>
                    </a>
                <?php endif; ?>
                <?php if($data->servicename == "Data Pin" && $data->status == 0): ?>
                <a href="view-pins?ref=<?php echo $_GET["ref"]; ?>" style="border-radius:2rem;" class="gradient-highlight btn-sm">
                    <b>View Pins</b>
                </a>
                <?php endif; ?>
            </div>

        </div>

</div>
