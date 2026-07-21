<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content">
            <div class="text-center mb-3"><i class="fa fa-sim-card fa-3x color-highlight"></i></div>
            <h3 class="text-center">SIM Hosting</h3>
            <p class="text-center">Purchase a SIM hosting slot for your data purchase workflow with status updates, retries, and monitoring.</p>
            <?php if(!empty($msg)){echo $msg;} ?>
            <form method="post">
                <input type="hidden" name="transref" value="<?php echo $controller->generateTransactionRef(); ?>">
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="serviceamount" class="color-theme opacity-80 font-700 font-12">Amount</label>
                    <input type="number" name="amount" id="serviceamount" class="round-small" placeholder="Amount" required>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="servicephone" class="color-theme opacity-80 font-700 font-12">Phone / SIM Number</label>
                    <input type="number" name="phone" id="servicephone" class="round-small" placeholder="Phone Number" required>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="servicenetwork" class="color-theme opacity-80 font-700 font-12">Network</label>
                    <select name="network" id="servicenetwork" class="round-small" required>
                        <option value="MTN">MTN</option>
                        <option value="AIRTEL">AIRTEL</option>
                        <option value="GLO">GLO</option>
                        <option value="9MOBILE">9MOBILE</option>
                    </select>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="serviceslot" class="color-theme opacity-80 font-700 font-12">SIM Slot</label>
                    <select name="slot" id="serviceslot" class="round-small" required>
                        <option value="Auto">Auto</option>
                        <option value="Slot-1">Slot 1</option>
                        <option value="Slot-2">Slot 2</option>
                        <option value="Slot-3">Slot 3</option>
                    </select>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="transkey" class="color-theme opacity-80 font-700 font-12">Transaction PIN</label>
                    <input type="password" name="transkey" id="transkey" class="round-small" placeholder="Transaction PIN" required>
                </div>
                <button type="submit" name="purchase-sim-hosting" class="btn btn-full btn-l font-600 font-15 gradient-highlight mt-4 rounded-s">Submit SIM Hosting Request</button>
            </form>
        </div>
    </div>
</div>
