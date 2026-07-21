<div class="page-content header-clear-medium">
    <div class="card card-style">
        <div class="content">
            <div class="text-center mb-3"><i class="fa fa-shield-alt fa-3x color-highlight"></i></div>
            <h3 class="text-center">BVN Verification</h3>
            <p class="text-center">Submit a BVN verification request through your configured provider and save it to wallet history.</p>
            <?php if(!empty($msg)){echo $msg;} ?>
            <form method="post">
                <input type="hidden" name="transref" value="<?php echo $controller->generateTransactionRef(); ?>">
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="bvnnumber" class="color-theme opacity-80 font-700 font-12">BVN Number</label>
                    <input type="number" name="bvn_number" id="bvnnumber" class="round-small" placeholder="11-digit BVN" required>
                </div>
                <div class="input-style input-style-always-active has-borders validate-field mb-4">
                    <label for="bvnpin" class="color-theme opacity-80 font-700 font-12">Transaction PIN</label>
                    <input type="password" name="transkey" id="bvnpin" class="round-small" placeholder="Transaction PIN" required>
                </div>
                <button type="submit" name="purchase-bvn-verification" class="btn btn-full btn-l font-600 font-15 gradient-highlight mt-4 rounded-s">Submit Verification</button>
            </form>
        </div>
    </div>
</div>
