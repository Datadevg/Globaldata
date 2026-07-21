<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">NIN Verification Service</h4>
            </div>
            <div class="box-body">
                <?php if(!empty($msg)){echo $msg;} ?>
                <form method="post">
                    <input type="hidden" name="save-service-settings" value="1">
                    <div class="form-group">
                        <label>NIN Verification Price</label>
                        <input type="number" name="nin_verification_price" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'nin_verification_price'); ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Save Settings</button>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">NIN Verification Transactions</h4>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-sm">
                    <thead><tr><th>#</th><th>Ref</th><th>User</th><th>Type</th><th>Value</th><th>Amount</th><th>Status</th></tr></thead>
                    <tbody>
                    <?php foreach($data[1] as $row){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->transref; ?></td>
                            <td><?php echo $row->sId; ?></td>
                            <td><?php echo $row->verification_type; ?></td>
                            <td><?php echo $row->value_text; ?></td>
                            <td>N<?php echo $row->amount; ?></td>
                            <td><?php echo $row->status; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
