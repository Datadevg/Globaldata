 <!-- Page content start here-->
        <div class="page-content header-clear">

    <div style="background-image:url(../../assets/img/bg/cc.png)">

        <div class="card notch-clear rounded-0 mb-2" data-card-height="200" style="background-color:<?php echo $sitecolor; ?>; (90deg, rgb(159, 5, 189) 25%, rgb(31, 16, 196) 75%);; opacity:0.9;">
            <div class="card-body pt-2 mt-2 mb-n2 text-left">
                
                 <div class="d-flex justify-content-between align-content-center">
                     <div>
                        <h1 class=" font-18 color-white">Wallet Balance</h1>
                        <h2 class="font-20 pt-2 color-white">
        
                            <span id="hideEyeDiv" style="display:none;">&#8358;<?php echo number_format($data->sWallet); ?></span>
                            <span id="openEyeDiv">&#8358; *********</span>
        
                            <span id="hideEye"><i class="fa fa-eye-slash" style="margin-left:20px;" aria-hidden="true"></i></span>
                            <span id="openEye" style="display:none; margin-left:20px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
        
                        </h2>
                  
                        <h2 class=" font-18 color-white">Commission: &#8358;0</h2>
                     </div>
                    
                        <div class="mt-5">
                        <h2 class=" font-12 color-white"><img src="../../assets/img/logow.png" style="width:130px; height:50px;" /></h2>
                    </div>
               </div>

            </div>
            <div class="mt-0 mb-5">

                <div class="card-body mt-0 d-flex justify-content-between align-content-center mb-4">

                    <div class="me-2">
                        <a href="fund-wallet" class="btn d-flex align-content-center font-12" style="border:2px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="add-circle" class="font-14"></ion-icon> <b class="ps-1">Add Money</b>
                        </a>
                    </div>

                    <div class="me-2">
                        <a href="referrals" class="btn d-flex align-content-center font-12" style="border:2px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="people-outline" class="font-14"></ion-icon> <b class="ps-1">Referrals</b>
                        </a>
                    </div>

                    <div>
                        <a href="transactions" class="btn d-flex align-content-center font-12" style="border:2px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="receipt-outline" class="font-14"></ion-icon> <b class="ps-1">History</b>
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid mt-n4 mb-3">
        <p class="mt-5 mb-2 text-dark"><b>What Would You Like To Do Today?</b></p>
    </div>

    <div class="myhomecard d-flex justify-content-between align-content-center mb-2">

        <a href="buy-airtime" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-phone font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Airtime</b></p>
        </a>

        <a href="buy-data" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-wifi font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Data</b></p>
        </a>

        <a href="cable-tv" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-tv font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Tv</b></p>
        </a>

        <a href="electricity" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-bolt font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Electricity</b></p>
        </a>

    </div>

    <div class="myhomecard d-flex justify-content-between align-content-center mb-2">


        <a href="exam-pins" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-graduation-cap font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Exam Pin</b></p>
        </a>

        <a href="buy-data-pin" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-barcode font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Data Pin</b></p>
        </a>

        <a href="pricing" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-list-alt font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Price List</b></p>
        </a>

        <a href="#agent-upgrade-modal" id="upgrade-agent-btn" data-menu="agent-upgrade-modal" class="card text-center shadow-l" style="width:100% ; margin:10px; margin-top:-5px;">
            <span class="icon pt-2" style="color:<?php echo $sitecolor; ?>;">
                <i class="fa fa-user-secret font-20"></i>
            </span>
            <p class="mb-2 pt-0 font-10"><b>Agent</b></p>
        </a>

    </div>

    <div class="mt-2 splide single-slider slider-no-arrows slider-no-dots splide--loop splide--ltr splide--draggable is-active mb-1" id="single-slider-1" style="visibility: visible;">
        <div class="splide__arrows"><button class="splide__arrow splide__arrow--prev" type="button" aria-controls="single-slider-1-track" aria-label="Previous slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40">
                    <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                </svg></button><button class="splide__arrow splide__arrow--next" type="button" aria-controls="single-slider-1-track" aria-label="Go to first slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40">
                    <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                </svg></button></div>
        <div class="splide__track col-lg-6 col-md-6" id="single-slider-1-track">
            <div class="splide__list" id="single-slider-1-list" style="transform: translateX(-2250px);">

                <div class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 450px;">
                    <div class="card card-style bg-20" data-card-height="130" style="height: 130px;">
                        <img class="img-fluid" style="height: 130px;" src="../../assets/img/ads/ads1.png">
                    </div>
                </div>
                <div class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 450px;">
                    <div class="card card-style bg-20" data-card-height="130" style="height: 130px;">
                        <img class="img-fluid" style="height: 130px;" src="../../assets/img/ads/ads2.png">
                    </div>
                </div>
                <div class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 450px;" id="single-slider-1-slide01">
                    <div class="card card-style bg-20" data-card-height="130" style="height: 130px;">
                        <img class="img-fluid" style="height: 130px;" src="../../assets/img/ads/ads3.png">
                    </div>
                </div>

                <div class="splide__slide" id="single-slider-1-slide02" aria-hidden="true" tabindex="-1" style="width: 450px;">
                    <div class="card card-style bg-20" data-card-height="130" style="height: 130px;">
                        <img class="img-fluid" style="height: 130px;" src="../../assets/img/ads/ads1.png">
                    </div>
                </div>