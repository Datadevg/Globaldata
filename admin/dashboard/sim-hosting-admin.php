<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">SIM Hosting Engine</h4>
            </div>
            <div class="box-body">
                <?php if(!empty($msg)){echo $msg;} ?>
                <form method="post">
                    <input type="hidden" name="save-service-settings" value="1">
                    <div class="form-group">
                        <label>SIM Hosting Routing</label>
                        <select name="sim_hosting_enabled" class="form-control">
                            <option value="On" <?php echo ($controller->getConfigValue($data[0], 'sim_hosting_enabled') == 'On') ? 'selected' : ''; ?>>Enabled</option>
                            <option value="Off" <?php echo ($controller->getConfigValue($data[0], 'sim_hosting_enabled') != 'On') ? 'selected' : ''; ?>>Disabled</option>
                        </select>
                        <small class="text-muted">When enabled, eligible data purchases will route through active SIM Hosting providers using priority and failover order.</small>
                    </div>
                    <div class="form-group">
                        <label>SIM Hosting Price</label>
                        <input type="number" name="sim_hosting_price" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'sim_hosting_price'); ?>">
                    </div>
                    <div class="form-group">
                        <label>NIN Verification Price</label>
                        <input type="number" name="nin_verification_price" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'nin_verification_price'); ?>">
                    </div>
                    <div class="form-group">
                        <label>BVN Verification Price</label>
                        <input type="number" name="bvn_verification_price" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'bvn_verification_price'); ?>">
                    </div>
                    <div class="form-group">
                        <label>SIM Provider Endpoint</label>
                        <input type="text" name="sim_provider_endpoint" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'sim_provider_endpoint'); ?>">
                    </div>
                    <div class="form-group">
                        <label>SIM Provider API Key</label>
                        <input type="text" name="sim_provider_api_key" class="form-control" value="<?php echo $controller->getConfigValue($data[0], 'sim_provider_api_key'); ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Save Service Settings</button>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add SIM Provider</h4>
            </div>
            <div class="box-body">
                <form method="post">
                    <input type="hidden" name="save-sim-provider" value="1">
                    <div class="row">
                        <div class="col-md-3 form-group"><input type="text" name="name" class="form-control" placeholder="Provider Name" required></div>
                        <div class="col-md-2 form-group"><input type="text" name="code" class="form-control" placeholder="Code" required></div>
                        <div class="col-md-2 form-group"><input type="text" name="service_type" class="form-control" placeholder="sim/nin/bvn" value="sim" required></div>
                        <div class="col-md-3 form-group"><input type="text" name="endpoint" class="form-control" placeholder="Endpoint"></div>
                        <div class="col-md-2 form-group"><input type="text" name="api_key" class="form-control" placeholder="API Key"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 form-group"><input type="number" name="priority" class="form-control" placeholder="Priority" value="1"></div>
                        <div class="col-md-2 form-group">
                            <select name="status" class="form-control">
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                        <div class="col-md-8 form-group"><input type="text" name="config_json" class="form-control" placeholder='{"mode":"default"}'></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Provider</button>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">SIM Devices</h4>
            </div>
            <div class="box-body">
                <form method="post">
                    <input type="hidden" name="save-sim-device" value="1">
                    <div class="row">
                        <div class="col-md-3 form-group"><input type="text" name="name" class="form-control" placeholder="Device Name" required></div>
                        <div class="col-md-2 form-group"><input type="number" name="provider_id" class="form-control" placeholder="Provider ID" required></div>
                        <div class="col-md-2 form-group"><input type="text" name="slot" class="form-control" placeholder="Slot" value="Auto"></div>
                        <div class="col-md-2 form-group"><input type="text" name="network" class="form-control" placeholder="Network" value="MTN"></div>
                        <div class="col-md-2 form-group">
                            <select name="status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><input type="text" name="metadata" class="form-control" placeholder='{"monitor":"yes"}'></div>
                    <button type="submit" class="btn btn-info">Add Device</button>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">SIM Hosting Transactions</h4>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-sm">
                    <thead><tr><th>#</th><th>Ref</th><th>User</th><th>Phone</th><th>Amount</th><th>Status</th><th>Response</th></tr></thead>
                    <tbody>
                    <?php foreach($data[3] as $row){ ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->transref; ?></td>
                            <td><?php echo $row->sId; ?></td>
                            <td><?php echo $row->phone; ?></td>
                            <td>N<?php echo $row->amount; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->response_msg; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
