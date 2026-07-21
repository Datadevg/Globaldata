<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content">
            <div class="text-center mb-3"><i class="fa fa-id-card fa-3x color-highlight"></i></div>
            <h3 class="text-center">NIN Verification</h3>
            <p class="text-center">Verify a National Identification Number through the configured provider gateway and deduct wallet balance.</p>
            <?php if(!empty($msg)){echo $msg;} ?>
            <form method="post">
                <input type="hidden" name="transref" value="<?php echo $controller->generateTransactionRef(); ?>">
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="verificationtype" class="color-theme opacity-80 font-700 font-12">Verification Type</label>
                    <select name="verification_type" id="verificationtype" class="round-small" required>
                        <option value="number">By NIN Number</option>
                        <option value="phone">By Phone Number</option>
                        <option value="demographics">By Demographics</option>
                    </select>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="verificationvalue" class="color-theme opacity-80 font-700 font-12">Value</label>
                    <input type="text" name="value_text" id="verificationvalue" class="round-small" placeholder="Enter NIN or phone or demographics" required>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="tranpin" class="color-theme opacity-80 font-700 font-12">Transaction PIN</label>
                    <input type="password" name="transkey" id="tranpin" class="round-small" placeholder="Transaction PIN" required>
                </div>
                <button type="submit" name="purchase-nin-verification" class="btn btn-full btn-l font-600 font-15 gradient-highlight mt-4 rounded-s">Submit Verification</button>
            </form>
        </div>
    </div>
</div>
