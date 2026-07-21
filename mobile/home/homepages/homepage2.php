 <!-- Page content start here-->
        <div class="mt-2">
            <div class="page-content header-clear-medium">

<!--div class="card card-style" data-card-height="210" style="background-image:url(../../assets/img/bg/cc.png); background-repeat: no-repeat; background-size: cover; border-radius:0px; ">
        <div style="height: 100vh; background-color:#000000;  opacity:0.9;">
            
            <div class="card-body pt-4 mt-2 mb-n2 text-center">
                <h1 class=" font-20 color-white">Wallet Balance</h1>
                <h2 class="font-30 ps-3 pt-2 color-white">

                    <span id="hideEyeDiv" style="display:none;">&#8358;0</span>
                    <span id="openEyeDiv">&#8358; *********</span>

                    <span id="hideEye"><i class="fa fa-eye-slash" style="margin-left:20px;" aria-hidden="true"></i></span>
                    <span id="openEye" style="display:none; margin-left:20px;"><i class="fa fa-eye" aria-hidden="true"></i></span>

                </h2>
                <h2 class=" font-16 color-white">Commission: &#8358;0</h2>

            </div>

            <div class="mt-0 mb-5">

                <div class="d-flex justify-content-center align-content-center mb-4">

                    <div class="me-3">
                        <a href="fund-wallet" class="btn d-flex align-content-center font-13" style="border:2px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="add-circle" class="font-18"></ion-icon> <b class="ps-1">Add Money</b>
                        </a>
                    </div>

                    <div>
                        <a href="contact-us" class="btn d-flex align-content-center font-13" style="border:2px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="call" class="font-18"></ion-icon> <b class="ps-1">Contact Us</b>
                        </a>
                    </div>

                </div>

            </div>

        </div>
</div-->

<!--div class="card card-style" data-card-height="180" style="background-repeat: no-repeat; background-size: cover; border-radius:0px; ">
        <div>
            
            <div class="card-body pt-2 mt-2 mb-n4 text-left">
                <h1 class=" font-13 color-dark">Wallet Balance</h1>
                <h2 class="font-20 color-dark">&#8358;0</h2>
                <h2 class=" font-15 color-dark">Commission: &#8358;0</h2>

            </div>

            <div class="card-body mt-0 mb-5">

                <div class="d-flex justify-content-left align-content-center mb-4">

                    <div class="me-3">
                        <a href="fund-wallet" class="btn d-flex align-content-center font-13" style="border:2px solid #000000; color: #000000; border-radius:2rem;">
                            <ion-icon name="add-circle" class="font-18"></ion-icon> <b class="ps-1">Add Money</b>
                        </a>
                    </div>

                    <div>
                        <a href="transactions" class="btn d-flex align-content-center font-13" style="border:2px solid #000000;  color: #000000; border-radius:2rem;">
                            <ion-icon name="receipt" class="font-18"></ion-icon> <b class="ps-1">History</b>
                        </a>
                    </div>

                </div>

            </div>

        </div>
</div-->

<div class="card card-style mt-2" data-card-height="160" style="background-image:url(../../assets/img/bg/cc.png); background-repeat: no-repeat; background-size: cover; border-radius:1rem; ">
        <div style="height: 100vh; background-color:<?php echo $sitecolor; ?>;  opacity:0.9;">
            
            <div class="card-body pt-0 mt-2 mb-n4 text-left">
                <div class="d-flex justify-content-between align-content-center">
                   <div>
                        <h1 class=" font-15 color-white">Wallet Blance</h1>
                        <h2 class="font-20" style="color: #FFFFFF;">&#8358;<?php echo number_format($data->sWallet); ?> </h2>
                        <h2 class=" font-15 color-white">Commission: &#8358;<?php echo number_format($data->sRefWallet); ?> </h2>
                   </div>
                   <div>
                        <h2 class=" font-13 color-white mt-5 mb-0 pb-0 text-right" align="right">Moniepoint Bank</h2>
                        <h2 class=" font-13 color-white text-right mt-0 pt-0"  align="right"><i class="fa fa-copy me-1"></i> <a href="#" onclick="copyToClipboard('<?php echo $data->sRolexBank; ?>')" class="color-white"> <?php echo $data->sRolexBank; ?></a></h2>
                   </div>
                </div>

            </div>
            
            

            <div class="card-body mt-0 mb-5">

                <div class="d-flex justify-content-between align-content-center mb-4">

                    <div class="">
                        <a href="fund-wallet" class="btn d-flex align-content-center font-10" style="border:1px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="add-circle" class="font-14"></ion-icon> <b class="ps-1">Add Money</b>
                        </a>
                    </div>

                    <div>
                        <a href="2bank" class="btn d-flex align-content-center font-10" style="border:1px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="send-outline" class="font-14"></ion-icon> <b class="ps-1">Transfer</b>
                        </a>
                    </div>
                    
                    <div>
                        <a href="transactions" class="btn d-flex align-content-center font-10" style="border:1px solid #ffffff; border-radius:2rem;">
                            <ion-icon name="receipt" class="font-14"></ion-icon> <b class="ps-1">History</b>
                        </a>
                    </div>
                    
                   

                </div>

            </div>

        </div>
</div>

    
    <div class="mt-n3 splide single-slider slider-no-arrows slider-no-dots splide--loop splide--ltr splide--draggable is-active mb-1" id="single-slider-1" style="visibility: visible;">
            <div class="splide__arrows"><button class="splide__arrow splide__arrow--prev" type="button" aria-controls="single-slider-1-track" aria-label="Go to last slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button><button class="splide__arrow splide__arrow--next" type="button" aria-controls="single-slider-1-track" aria-label="Next slide"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40"><path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path></svg></button></div>
            <div class="splide__track" id="single-slider-1-track">
                    <div class="splide__list" id="single-slider-1-list" style="transform: translateX(-624px);">
                            
                            <div class="splide__slide splide__slide--clone" aria-hidden="true" tabindex="-1" style="width: 312px;">
                                <div class="card card-style bg-20" data-card-height="120" style="height: 120px; border-radius:20px;">
                                    <img class="img-fluid" style="height: 120px;" src="../../assets/img/ads/ads1.png" />
                                </div>
                            </div>
                           
                            <div class="splide__slide" id="single-slider-1-slide02" aria-hidden="true" tabindex="-1" style="width: 312px;">
                               <div class="card card-style bg-20" data-card-height="120" style="height: 120px; border-radius:20px;">
                                    <img class="img-fluid" style="height: 120px;" src="../../assets/img/ads/ads2.png" />
                                </div>
                            </div>
                            
                            <div class="splide__slide" id="single-slider-1-slide03" aria-hidden="true" tabindex="-1" style="width: 312px;">
                               <div class="card card-style bg-20" data-card-height="120" style="height: 120px; border-radius:20px;;">
                                    <img class="img-fluid" style="height: 120px;" src="../../assets/img/ads/ads3.png" />
                                </div>
                    
        
                    </div>
            </div>
        </div>
        
    <div class="container-fluid mb-0 mt-n4">
        
        <div class="card mb-0">
            <div class="content">
                
                <p class="text-left text-dark mb-2">What Would You Like To Do Today?</p>
                
               <div class="row text-center mb-0" style="margin:0px !important; padding:0px !important;">
                   
                
                    
                <a href="buy-airtime" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-phone font-18"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Airtime</p>
                    </a>

                    <a href="buy-data" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-wifi font-18 "></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Data</p>
                    </a>

                    <a href="cable-tv" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-tv font-18 "></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Cable TV</p>
                    </a>

                    <a href="electricity" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-bolt font-18 "></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Electricity</p>
                    </a>

                    <a href="exam-pins" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-graduation-cap font-18 "></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Exam Pins</p>
                    </a>
                    
                    <a href="update-bvn" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-university font-18"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Kyc Verification</p>
                    </a>

                    <a href="profile" class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-cogs   font-18"></i>
                        </span>
                        <p class="mb-0 pt-1 font-9 text-dark">Profile</p>
                    </a>

                    
                    <a  href="own-website" id="job-btn" data-menu="job-upgrade-modal"  class="col-3 mt-2" style="padding:0px !important;">
                        <span class="icon icon-l  " style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-laptop font-18"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Own Vtu Website</p>
                    </a>
                    
                    <a href="pricing" class="col-3 mt-2 mb-2" style="padding:0px !important;">
                        <span class="icon icon-l" style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-list font-13"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Pricing</p>
                    </a>
    
                    <a href="referrals" class="col-3 mt-2 mb-2" style="padding:0px !important;">
                        <span class="icon icon-l" style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-users font-13"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark ">Referrals</p>
                    </a>
                    
                     <a href="#agent-upgrade-modal" id="upgrade-agent-btn" data-menu="agent-upgrade-modal" class="col-3 mt-2 mb-2" style="padding:0px !important;">
                        <span class="icon icon-l" style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-handshake font-17"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Agent</p>
                    </a>
                    
                    <a href="https://www.mediafire.com/file/zwsj0czg8stwcur/Vtu_Telecom_App.apk/file" class="col-3 mt-2 mb-2" style="padding:0px !important;">
                        <span class="icon icon-l" style="background-color:<?php echo $sitecolor; ?>; color:#ffffff;  border-radius:50%; ">
                            <i class="fa fa-download  font-13"></i>
                        </span>
                        <p class="mb-0 pt-1 font-10 text-dark">Download APP</p>
                    </a>

                    
                    
                </div>
            </div>
        </div>
    </div>
    
     
    
</div>
