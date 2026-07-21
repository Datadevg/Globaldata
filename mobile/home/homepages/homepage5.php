<style>
/* Premium Fintech Dashboard - Opay/Palmpay/Moniepoint Quality */
:root{
  --primary:<?php echo $sitecolor; ?>;
  --deep:#0a6bd6;
  --light:#f6f9ff;
  --muted:#8b9bb8;
  --success:#10b981;
  --danger:#ef4444;
  --text-dark:#052c57;
  --text-light:#7c8fa6;
  --white:#ffffff;
  --shadow-sm:0 2px 8px rgba(10,80,160,0.08);
  --shadow-md:0 8px 20px rgba(10,80,160,0.12);
  --shadow-lg:0 14px 35px rgba(10,80,160,0.15)
}

* {box-sizing: border-box}

.dashboard{
  padding:16px 12px 100px 12px;
  background:#f6f9ff;
  min-height:100vh;
  position:relative
}

/* Top Bar */
.topbar{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:12px;
  margin-bottom:18px;
  position:relative;
  z-index:10
}

.topbar-left{
  display:flex;
  align-items:center;
  gap:12px;
  flex:1
}

.hamburger{
  width:44px;
  height:44px;
  border-radius:12px;
  background:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  box-shadow:0 2px 8px rgba(10,80,160,0.08);
  cursor:pointer;
  transition:all 0.3s ease;
  border:1px solid rgba(10,80,160,0.04)
}

.hamburger:active{
  transform:scale(0.95);
  box-shadow:0 4px 12px rgba(10,80,160,0.12)
}

.hamburger i{
  color:var(--primary);
  font-size:20px
}

.greeting{
  flex:1;
  margin-left:4px
}

.greeting small{
  display:block;
  color:var(--text-light);
  font-size:11px;
  font-weight:500;
  margin-bottom:3px
}

.greeting .name{
  font-weight:700;
  color:var(--text-dark);
  font-size:16px;
  letter-spacing:-0.3px
}

.notify-wrap{
  display:flex;
  align-items:center;
  gap:8px
}

.notify-icon{
  position:relative;
  width:44px;
  height:44px;
  border-radius:12px;
  background:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  box-shadow:0 2px 8px rgba(10,80,160,0.08);
  cursor:pointer;
  transition:all 0.3s ease;
  color:var(--primary);
  text-decoration:none;
  border:1px solid rgba(10,80,160,0.04)
}

.notify-icon:active{
  transform:scale(0.95);
  box-shadow:0 4px 12px rgba(10,80,160,0.12)
}

.notify-icon i{
  font-size:20px
}

.notify-badge{
  position:absolute;
  top:-6px;
  right:-6px;
  background:var(--danger);
  color:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:10px;
  font-weight:700;
  box-shadow:0 2px 6px rgba(239,68,68,0.4)
}

.avatar{
  width:44px;
  height:44px;
  border-radius:12px;
  background:linear-gradient(135deg,var(--primary),var(--deep));
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  font-weight:700;
  font-size:16px;
  box-shadow:0 2px 8px rgba(10,80,160,0.12);
  cursor:pointer;
  transition:all 0.3s ease;
  text-decoration:none;
  border:2px solid rgba(255,255,255,0.3)
}

.avatar:active{
  transform:scale(0.95);
  box-shadow:0 4px 12px rgba(10,80,160,0.16)
}

/* Wallet Card */
.wallet{
  margin-bottom:18px;
  border-radius:18px;
  padding:20px;
  background:linear-gradient(135deg,var(--primary) 0%,var(--deep) 100%);
  color:#fff;
  box-shadow:0 12px 32px rgba(10,80,160,0.2);
  position:relative;
  overflow:hidden
}

.wallet::before{
  content:'';
  position:absolute;
  top:-50%;
  right:-50%;
  width:300px;
  height:300px;
  background:rgba(255,255,255,0.12);
  border-radius:50%;
  pointer-events:none;
  animation:float 6s ease-in-out infinite
}

@keyframes float {
  0%, 100% { transform: translate(0, 0); }
  50% { transform: translate(10px, 10px); }
}

.wallet-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:12px;
  position:relative;
  z-index:1
}

.wallet-label{
  font-size:12px;
  opacity:0.92;
  font-weight:500;
  letter-spacing:0.3px;
  text-transform:uppercase
}

.wallet-balance-group{
  display:flex;
  align-items:baseline;
  gap:6px
}

.wallet-currency{
  font-size:18px;
  font-weight:600;
  opacity:0.95
}

.wallet-balance{
  font-size:28px;
  font-weight:700;
  letter-spacing:-0.5px;
  font-family:'Courier New',monospace
}

.eye-toggle{
  cursor:pointer;
  opacity:0.9;
  font-size:18px;
  transition:all 0.2s ease;
  padding:6px;
  border-radius:8px;
  display:flex;
  align-items:center;
  justify-content:center
}

.eye-toggle:active{
  opacity:0.6;
  background:rgba(255,255,255,0.1)
}

.wallet-actions{
  margin-top:16px;
  display:flex;
  gap:8px;
  position:relative;
  z-index:1;
  flex-wrap:wrap
}

.btn-white{
  background:#fff;
  color:var(--primary);
  padding:10px 14px;
  border-radius:10px;
  font-weight:700;
  font-size:12px;
  text-decoration:none;
  flex:1;
  text-align:center;
  transition:all 0.3s ease;
  border:none;
  cursor:pointer;
  box-shadow:0 2px 8px rgba(255,255,255,0.3);
  min-width:70px
}

.btn-white:active{
  transform:scale(0.96);
  box-shadow:0 1px 4px rgba(255,255,255,0.2)
}

/* Reserved Account Card */
.reserved{
  margin-top:16px;
  padding:16px;
  border-radius:14px;
  background:#fff;
  box-shadow:0 2px 8px rgba(10,80,160,0.08);
  position:relative;
  z-index:1;
  border:1px solid rgba(10,80,160,0.04)
}

.reserved-header{
  display:flex;
  align-items:center;
  gap:12px;
  margin-bottom:12px
}

.bank-logo{
  width:48px;
  height:48px;
  border-radius:12px;
  background:linear-gradient(135deg,#f0f6ff,#e5f0ff);
  display:flex;
  align-items:center;
  justify-content:center;
  color:var(--primary);
  font-weight:700;
  font-size:14px;
  box-shadow:0 2px 6px rgba(10,80,160,0.08);
  border:1px solid rgba(10,80,160,0.06)
}

.reserved-info{
  flex:1
}

.reserved-label{
  font-size:11px;
  color:var(--text-light);
  margin-bottom:3px;
  font-weight:600;
  text-transform:uppercase;
  letter-spacing:0.5px
}

.reserved-number{
  font-weight:700;
  color:var(--text-dark);
  font-size:15px;
  font-family:'Courier New',monospace;
  letter-spacing:1px;
  margin-bottom:4px
}

.reserved-name{
  font-size:12px;
  color:var(--text-light)
}

.copy-icon{
  width:36px;
  height:36px;
  background:linear-gradient(135deg,var(--primary),var(--deep));
  border:none;
  border-radius:9px;
  color:#fff;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:16px;
  transition:all 0.2s ease;
  box-shadow:0 2px 8px rgba(10,80,160,0.15)
}

.copy-icon:active{
  transform:scale(0.9);
  box-shadow:0 1px 4px rgba(10,80,160,0.2)
}

.reserved-actions{
  margin-top:12px;
  display:flex;
  gap:8px
}

.reserved-actions .btn-white{
  flex:1;
  padding:9px 12px;
  font-size:11px
}

/* Banner Slider */
.slider{
  margin-bottom:18px;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 4px 12px rgba(10,80,160,0.1);
  border:1px solid rgba(10,80,160,0.04)
}

.slider img{
  width:100%;
  height:auto;
  display:block;
  object-fit:cover
}

/* Services Section */
.services-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:14px;
  margin-top:4px
}

.services-title{
  font-size:18px;
  font-weight:700;
  color:var(--text-dark);
  margin:0;
  letter-spacing:-0.3px
}

.services-viewall{
  font-size:12px;
  color:var(--primary);
  text-decoration:none;
  font-weight:600;
  padding:6px 10px;
  border-radius:8px;
  transition:all 0.2s;
  display:inline-flex;
  align-items:center
}

.services-viewall:active{
  background:rgba(10,80,160,0.08)
}

.services-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:10px;
  margin-bottom:18px;
  align-items:stretch;
}

.service-card{
  background:#fff;
  border-radius:12px;
  padding:10px;
  height:92px;
  text-align:center;
  box-shadow:0 2px 8px rgba(10,80,160,0.06);
  text-decoration:none;
  color:var(--text-dark);
  transition:all 0.25s ease;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  gap:6px;
  font-size:11px;
  font-weight:600;
  line-height:1.2;
  border:1px solid rgba(10,80,160,0.05);
  word-break:break-word;
  overflow-wrap:break-word;
  word-spacing:normal;
}

.service-card:active{
  transform:translateY(-2px);
  box-shadow:0 6px 16px rgba(10,80,160,0.12);
  border-color:rgba(10,80,160,0.1)
}

.service-icon{
  font-size:18px;
  color:var(--primary);
  display:block;
  flex-shrink:0;
  transition:transform 0.2s ease;
}

.service-card:active .service-icon{
  transform:scale(1.15)
}

/* Recent Transactions */
.recent{
  background:#fff;
  border-radius:16px;
  padding:18px;
  box-shadow:0 4px 12px rgba(10,80,160,0.08);
  margin-bottom:18px;
  border:1px solid rgba(10,80,160,0.04)
}

.recent-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:16px;
  padding-bottom:14px;
  border-bottom:2px solid #f0f4f8
}

.recent-title{
  font-size:16px;
  font-weight:700;
  color:var(--text-dark);
  margin:0;
  letter-spacing:-0.3px
}

.recent-viewall{
  font-size:12px;
  color:var(--primary);
  text-decoration:none;
  font-weight:600;
  padding:6px 10px;
  border-radius:8px;
  transition:all 0.2s
}

.recent-viewall:active{
  background:rgba(10,80,160,0.08)
}

.transaction-item{
  display:flex;
  align-items:center;
  gap:12px;
  padding:14px;
  text-decoration:none;
  color:var(--text-dark);
  border-radius:12px;
  transition:all 0.2s;
  margin-bottom:8px
}

.transaction-item:last-child{
  margin-bottom:0
}

.transaction-item:active{
  background:#f5f8fb;
  box-shadow:0 2px 8px rgba(10,80,160,0.08)
}

.tx-icon{
  width:44px;
  height:44px;
  border-radius:12px;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  font-size:18px;
  flex-shrink:0;
  box-shadow:0 3px 10px rgba(0,0,0,0.15)
}

.tx-icon-airtime{background:linear-gradient(135deg,#8b5cf6,#7c3aed)}
.tx-icon-data{background:linear-gradient(135deg,#06b6d4,#0891b2)}
.tx-icon-cable{background:linear-gradient(135deg,#f59e0b,#d97706)}
.tx-icon-electricity{background:linear-gradient(135deg,#eab308,#ca8a04)}
.tx-icon-exam{background:linear-gradient(135deg,#10b981,#059669)}
.tx-icon-wallet{background:linear-gradient(135deg,#ec4899,#be185d)}
.tx-icon-referral{background:linear-gradient(135deg,#f43f5e,#e11d48)}
.tx-icon-default{background:linear-gradient(135deg,#6366f1,#4f46e5)}

.tx-info{
  flex:1;
  min-width:0
}

.tx-name{
  font-weight:700;
  font-size:13px;
  color:var(--text-dark);
  margin-bottom:3px;
  white-space:nowrap;
  overflow:hidden;
  text-overflow:ellipsis;
  letter-spacing:-0.2px
}

.tx-desc{
  font-size:12px;
  color:var(--text-light);
  white-space:nowrap;
  overflow:hidden;
  text-overflow:ellipsis
}

.tx-details{
  text-align:right;
  flex-shrink:0;
  min-width:60px
}

.tx-amount{
  font-weight:700;
  font-size:14px;
  margin-bottom:3px;
  letter-spacing:-0.2px
}

.tx-amount.credit{
  color:var(--success)
}

.tx-amount.debit{
  color:var(--danger)
}

.tx-date{
  font-size:11px;
  color:var(--text-light);
  display:flex;
  align-items:center;
  justify-content:flex-end;
  gap:4px
}

.tx-status{
  margin-left:2px;
  font-size:12px
}

/* Empty State */
.empty-state{
  text-align:center;
  padding:24px 12px;
  color:var(--text-light)
}

.empty-state p{
  margin:0;
  font-size:13px;
  line-height:1.5
}

.empty-state a{
  color:var(--primary);
  text-decoration:none;
  font-weight:600
}

/* Bottom Navigation */
.bnav{
  position:fixed;
  left:8px;
  right:8px;
  bottom:8px;
  background:#fff;
  border-radius:16px;
  padding:12px 0;
  display:flex;
  justify-content:space-around;
  box-shadow:0 12px 32px rgba(10,80,160,0.18);
  backdrop-filter:blur(12px);
  border:1px solid rgba(10,80,160,0.06);
  z-index:100
}

.bnav a{
  flex:1;
  text-align:center;
  text-decoration:none;
  color:var(--text-light);
  font-weight:700;
  font-size:12px;
  padding:8px 4px;
  transition:all 0.2s ease;
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:4px;
  border-radius:12px;
  margin:0 4px
}

.bnav a i{
  font-size:20px;
  transition:transform 0.2s ease
}

.bnav a:active,
.bnav a.active{
  color:var(--primary);
  background:rgba(10,80,160,0.06)
}

.bnav a:active i,
.bnav a.active i{
  transform:scale(1.1)
}

/* Responsive Design */
@media (max-width:480px){
  .services-grid{grid-template-columns:repeat(4,1fr);gap:9px}
  .service-card{height:88px;padding:9px;font-size:10px}
  .service-icon{font-size:16px}
  .wallet-balance{font-size:26px}
  .wallet-actions{gap:6px}
  .btn-white{padding:9px 12px;font-size:11px}
  .dashboard{padding:14px 10px 110px 10px}
}

@media (max-width:380px){
  .services-grid{grid-template-columns:repeat(4,1fr);gap:8px}
  .service-card{height:84px;padding:8px;font-size:9px}
  .service-icon{font-size:15px}
  .wallet-balance{font-size:24px}
  .wallet{padding:16px}
  .wallet-actions{gap:5px}
  .btn-white{padding:8px 10px;font-size:10px}
  .wallet-label{font-size:11px}
  .wallet-currency{font-size:16px}
  .bnav a{font-size:10px}
  .bnav a i{font-size:18px}
  .topbar-left{gap:10px}
}

@media (max-width:320px){
  .services-grid{grid-template-columns:repeat(4,1fr);gap:7px}
  .service-card{height:80px;padding:8px;font-size:8px}
  .service-icon{font-size:14px}
  .wallet{padding:14px}
  .wallet-balance{font-size:22px}
  .bnav a i{font-size:16px}
  .bnav a{font-size:9px;gap:2px;padding:6px 2px}
  .hamburger,.notify-icon,.avatar{width:40px;height:40px;font-size:16px}
  .greeting .name{font-size:14px}
  .greeting small{font-size:10px}
}

@media (min-width:768px){
  .dashboard{padding:24px 20px 100px 20px}
  .services-grid{grid-template-columns:repeat(4,1fr);gap:12px}
  .service-card{height:100px;padding:12px;font-size:12px}
  .service-icon{font-size:20px}
  .wallet{padding:24px}
  .wallet-balance{font-size:32px}
  .wallet-actions{gap:10px}
  .btn-white{padding:12px 16px;font-size:13px}
}

@media (min-width:1024px){
  .dashboard{padding:32px 28px 100px 28px}
  .services-grid{grid-template-columns:repeat(4,1fr);gap:14px}
  .service-card{height:104px;font-size:13px}
  .service-icon{font-size:22px}
}
</style>

<div class="page-content header-clear">

    <div class="dashboard">

        <!-- Header: Hamburger / Greeting / Notify / Avatar -->
        <div class="topbar">
            <div class="topbar-left">
                <div class="hamburger" aria-label="menu">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="greeting">
                    <small>Good Morning</small>
                    <div class="name"><?php echo $data->sFname; ?></div>
                </div>
            </div>

            <div class="notify-wrap">
                <a href="notifications" class="notify-icon">
                    <i class="fa fa-bell"></i>
                    <div class="notify-badge">3</div>
                </a>
                <a href="#" data-menu="menu-profile" class="avatar"><?php echo strtoupper(substr($data->sFname,0,1)); ?></a>
            </div>
        </div>

        <!-- Premium Wallet Card -->
        <div class="wallet">
            <div class="wallet-header">
                <div>
                    <div class="wallet-label">Wallet Balance</div>
                    <div class="wallet-balance-group">
                        <span class="wallet-currency">₦</span>
                        <div class="wallet-balance"><span id="hideEyeDiv" style="display:none"><?php echo number_format($data->sWallet); ?></span><span id="openEyeDiv">*********</span></div>
                    </div>
                </div>
                <div>
                    <div class="eye-toggle" id="hideEye"><i class="fa fa-eye-slash"></i></div>
                    <div class="eye-toggle" id="openEye" style="display:none"><i class="fa fa-eye"></i></div>
                </div>
            </div>

            <div class="wallet-actions">
                <a href="fund-wallet" class="btn-white">+ Add Money</a>
                <a href="transactions" class="btn-white">History</a>
            </div>

            <!-- Reserved Account card inside wallet area -->
            <div class="reserved">
                <?php
                $reservedBank = '';
                $reservedAcct = '';
                if(!empty($data->sMonieBank)){
                    $reservedBank = 'Moniepoint MFB';
                    $reservedAcct = $data->sMonieBank;
                } elseif(!empty($data->sFidelityBank)){
                    $reservedBank = 'Fidelity Bank';
                    $reservedAcct = $data->sFidelityBank;
                } elseif(!empty($data->sWemaBank)){
                    $reservedBank = 'Wema Bank';
                    $reservedAcct = $data->sWemaBank;
                } elseif(!empty($data->sSterlingBank)){
                    $reservedBank = 'Sterling Bank';
                    $reservedAcct = $data->sSterlingBank;
                } else {
                    $reservedBank = isset($data3->bankname) ? $data3->bankname : '';
                    $reservedAcct = isset($data3->accountno) ? $data3->accountno : '';
                }
                $reservedAcctDisplay = !empty($reservedAcct) ? $reservedAcct : '0000000000';
                $bankInitials = strtoupper(substr(preg_replace('/[^A-Za-z]/','',$reservedBank),0,2));
                ?>
                <div class="reserved-header">
                    <div class="bank-logo"><?php echo $bankInitials ?: 'BD'; ?></div>
                    <div class="reserved-info">
                        <div class="reserved-label">Reserved Account</div>
                        <div class="reserved-number"><?php echo $reservedAcctDisplay; ?></div>
                        <div class="reserved-name"><?php echo isset($data3->accountname) ? $data3->accountname : 'Account'; ?></div>
                    </div>
                    <button class="copy-icon" onclick="copyToClipboard('<?php echo $reservedAcctDisplay; ?>')" title="Copy Account Number">
                        <i class="fa fa-copy"></i>
                    </button>
                </div>
                <div class="reserved-actions">
                    <a href="profile" class="btn-white">Manage</a>
                    <a href="airtime2cash" class="btn-white">Manual Withdraw</a>
                </div>
            </div>
        </div>

        <!-- Banner slider -->
        <div class="slider">
            <img src="../../assets/img/ads/ads1.png" alt="ads" />
        </div>

        <!-- Services grid -->
        <div class="services-header">
            <h4 class="services-title">Services</h4>
            <a href="transactions" class="services-viewall">View All →</a>
        </div>
        <div class="services-grid">
            <a href="buy-airtime" class="service-card"><i class="fa fa-phone service-icon"></i>Airtime</a>
            <a href="buy-data" class="service-card"><i class="fa fa-wifi service-icon"></i>Data</a>
            <a href="electricity" class="service-card"><i class="fa fa-bolt service-icon"></i>Electricity</a>

            <a href="exam-pins" class="service-card"><i class="fa fa-graduation-cap service-icon"></i>Exam Pins</a>
            <a href="cable-tv" class="service-card"><i class="fa fa-tv service-icon"></i>Cable TV</a>
            <a href="recharge-pin" class="service-card"><i class="fa fa-credit-card service-icon"></i>Recharge Card</a>
            <a href="fund-wallet" class="service-card"><i class="fa fa-wallet service-icon"></i>Add Fund</a>

            <a href="transactions" class="service-card"><i class="fa fa-history service-icon"></i>History</a>
            <a href="profile" class="service-card"><i class="fa fa-user service-icon"></i>Profile</a>
            <a href="nin-verify" class="service-card"><i class="fa fa-id-card service-icon"></i>NIN Verify</a>
            <a href="bvn-verify" class="service-card"><i class="fa fa-id-badge service-icon"></i>BVN Verify</a>

            <a href="smile-data" class="service-card"><i class="fa fa-signal service-icon"></i>Smile Data</a>
            <a href="alpha-topup" class="service-card"><i class="fa fa-cloud service-icon"></i>Alpha Data</a>
            <a href="airtime-swap" class="service-card"><i class="fa fa-exchange-alt service-icon"></i>Airtime Swap</a>
            <a href="#" class="service-card"><i class="fa fa-phone service-icon"></i>Kirani</a>
            <a href="buy-data-pin" class="service-card"><i class="fa fa-id-card service-icon"></i>Data Card</a>
        </div>

        <!-- Recent transactions -->
        <div class="recent">
            <div class="recent-header">
                <h5 class="recent-title">Recent Transactions</h5>
                <a href="transactions" class="recent-viewall">View All →</a>
            </div>
            
            <?php
            // Determine transaction type icon and determine if credit or debit
            function getTransactionIcon($serviceName) {
                $service = strtolower($serviceName);
                if (strpos($service, 'referral bonus') !== false || strpos($service, 'bonus') !== false) {
                    return ['icon' => 'fa fa-gift', 'class' => 'tx-icon-referral'];
                } elseif (strpos($service, 'airtime') !== false) {
                    return ['icon' => 'fa fa-phone', 'class' => 'tx-icon-airtime'];
                } elseif (strpos($service, 'data') !== false) {
                    return ['icon' => 'fa fa-wifi', 'class' => 'tx-icon-data'];
                } elseif (strpos($service, 'cable') !== false) {
                    return ['icon' => 'fa fa-tv', 'class' => 'tx-icon-cable'];
                } elseif (strpos($service, 'electricity') !== false) {
                    return ['icon' => 'fa fa-bolt', 'class' => 'tx-icon-electricity'];
                } elseif (strpos($service, 'exam') !== false) {
                    return ['icon' => 'fa fa-graduation-cap', 'class' => 'tx-icon-exam'];
                } elseif (strpos($service, 'transfer') !== false || strpos($service, 'withdrawal') !== false) {
                    return ['icon' => 'fa fa-arrow-up', 'class' => 'tx-icon-wallet'];
                } else {
                    return ['icon' => 'fa fa-list', 'class' => 'tx-icon-default'];
                }
            }

            // Check if transaction is credit or debit
            function isTransactionCredit($serviceName) {
                $service = strtolower($serviceName);
                return (strpos($service, 'bonus') !== false || strpos($service, 'referral') !== false);
            }
            
            if(!empty($data) && is_array($data)){
                $count = 0;
                foreach($data as $list){
                    if($count >= 3) break;
                    $txInfo = getTransactionIcon($list->servicename);
                    $isCredit = isTransactionCredit($list->servicename);
            ?>
            <a href="transaction-details?ref=<?php echo $list->transref; ?>" class="transaction-item">
                <div class="tx-icon <?php echo $txInfo['class']; ?>">
                    <i class="fa <?php echo str_replace('fa ', '', $txInfo['icon']); ?>"></i>
                </div>
                <div class="tx-info">
                    <div class="tx-name"><?php echo $list->servicename; ?></div>
                    <div class="tx-desc"><?php echo substr($list->servicedesc, 0, 30); ?></div>
                </div>
                <div class="tx-details">
                    <div class="tx-amount <?php echo $isCredit ? 'credit' : 'debit'; ?>">
                        <?php echo $isCredit ? '+' : '-'; ?>₦<?php echo number_format($list->amount); ?>
                    </div>
                    <div class="tx-date">
                        <?php echo $controller->formatDate2($list->date); ?>
                        <span class="tx-status">
                            <?php if($list->status == 0): ?>
                                <i class="fa fa-check-circle" style="color:var(--success)"></i>
                            <?php elseif($list->status == 5 || $list->status == 2): ?>
                                <i class="fa fa-exclamation-circle" style="color:var(--primary)"></i>
                            <?php else: ?>
                                <i class="fa fa-times-circle" style="color:var(--danger)"></i>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </a>
            <?php
                    $count++;
                }
            } else {
            ?>
            <div class="empty-state">
                <p>No recent transactions yet.</p>
                <p><a href="fund-wallet">Start by funding your wallet</a> or <a href="buy-airtime">buy airtime</a></p>
            </div>
            <?php } ?>
        </div>

    </div>

    <!-- Premium bottom navigation -->
    <div class="bnav">
        <a href="./">
            <i class="fa fa-home"></i>
            <span>Home</span>
        </a>
        <a href="buy-airtime">
            <i class="fa fa-shopping-bag"></i>
            <span>Services</span>
        </a>
        <a href="fund-wallet">
            <i class="fa fa-plus-circle"></i>
            <span>Fund</span>
        </a>
        <a href="transactions">
            <i class="fa fa-history"></i>
            <span>Transactions</span>
        </a>
        <a href="profile">
            <i class="fa fa-user"></i>
            <span>Profile</span>
        </a>
    </div>

    <div id="menu-profile" class="menu menu-box-bottom rounded-m" data-menu-height="380">
        <div class="menu-title">
            <h1>Account Menu</h1>
            <p class="color-highlight">Quick access to your profile and settings</p>
            <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="content pt-0">
            <div class="list-group">
                <a href="profile" class="list-group-item"><i class="fa fa-user"></i>Profile</a>
                <a href="fund-wallet" class="list-group-item"><i class="fa fa-wallet"></i>Wallet</a>
                <a href="transactions" class="list-group-item"><i class="fa fa-history"></i>Transactions</a>
                <a href="notifications" class="list-group-item"><i class="fa fa-bell"></i>Notifications</a>
                <a href="settings" class="list-group-item"><i class="fa fa-cog"></i>Settings</a>
                <a href="contact-us" class="list-group-item"><i class="fa fa-headset"></i>Support</a>
                <a href="logout" class="list-group-item text-danger"><i class="fa fa-power-off"></i>Logout</a>
            </div>
        </div>
    </div>

</div>

<script>
// Eye toggle functionality for wallet balance
document.addEventListener('DOMContentLoaded', function() {
    const hideEyeDiv = document.getElementById('hideEyeDiv');
    const openEyeDiv = document.getElementById('openEyeDiv');
    const hideEye = document.getElementById('hideEye');
    const openEye = document.getElementById('openEye');
    
    if (hideEye && openEye) {
        hideEye.addEventListener('click', function() {
            hideEyeDiv.style.display = 'inline';
            openEyeDiv.style.display = 'none';
            hideEye.style.display = 'none';
            openEye.style.display = 'block';
        });
        
        openEye.addEventListener('click', function() {
            hideEyeDiv.style.display = 'none';
            openEyeDiv.style.display = 'inline';
            hideEye.style.display = 'block';
            openEye.style.display = 'none';
        });
    }
});

// Copy to clipboard function
function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Account number copied!');
        }).catch(function(err) {
            fallbackCopy(text);
        });
    } else {
        fallbackCopy(text);
    }
}

function fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        alert('Account number copied!');
    } catch (err) {
        console.error('Copy failed:', err);
    }
    document.body.removeChild(textarea);
}
</script>