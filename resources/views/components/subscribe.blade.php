<div>
    <style>
        .utf_cta_area2_block .utf_subscribe_block .contact-form-action .subscribe{
            position: relative;
        }
    </style>
    <!-- Subscribe Block Start -->
    <section class="utf_cta_area_item utf_cta_area2_block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="utf_subscribe_block">
                        <div class="col-xl-8 col-md-7">
                            <div class="section-heading">
                                <h2 class="utf_sec_title_item utf_sec_title_item2">Subscribe to Our Newsletter!</h2>
                                <p class="utf_sec_meta">Subscribe to get latest updates and information.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-5">
                            <div class="contact-form-action">
                                <form name="contactUsForm" id="contactUsForm" method="post" action="javascript:void(0)">
                                    @csrf
                                    <i class="icon-material-baseline-mail-outline"></i>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email" required="">
                                    <button class="utf_theme_btn" type="submit" id="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Block End -->
</div>