@extends('layouts.frontend.master')

@section('title', 'About')

@section('css')
<style>
    fieldset {
        border: 2px solid #212529;
    }
</style>
@endsection

@section('content')
<div class="sec-about py-5">
    <div class="container">
        <div class="row g-4 my-2">
            <h2 class="cmn-ttl text-uppercase mb-4">
                About Us
            </h2>

            <div class="txt-blk mb-4">
                <h5 class="fw-bold text-uppercase">&#10061; Who We Are</h5>
                <p class="fs-14" style="text-align: justify;">
                    At RIG, we are a team of dedicated professionals who are committed to curating the best products for you. Our diverse backgrounds and expertise in various industries help us stay ahead of the curve, ensuring that we bring you the most sought-after and exclusive items available.
                </p>
            </div>

            <div class="txt-blk mb-4">
                <h5 class="fw-bold text-uppercase">&#10061; What We Offer</h5>
                <p class="fs-14" style="text-align: justify;">
                    From fashionable clothing and accessories to innovative gadgets and home essentials, our product range is carefully selected to cater to your needs and desires. We believe in quality over quantity, and every item in our collection is thoroughly tested and approved before making it to our store.
                </p>
            </div>

            <div class="row my-4">
                <h5 class="fw-bold text-uppercase mb-4">&#10061; Why Choose Us</h5>

                <div class="col-lg-4 mb-4 service-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Quality Assurance
                        </legend>
                        <p class="fs-14">
                            We understand the importance of quality, and that's why we work closely with trusted suppliers and brands to bring you products that meet our high standards.
                        </p>
                    </fieldset>
                </div>

                <div class="col-lg-4 mb-4 service-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Customer Satisfaction
                        </legend>
                        <p class="fs-14">
                            Our customers are at the heart of everything we do. We strive to provide you with a seamless shopping experience, excellent customer service, and timely delivery of your orders.
                        </p>
                    </fieldset>
                </div>

                <div class="col-lg-4 mb-4 service-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Trendsetting Selection
                        </legend>
                        <p class="fs-14">
                            Our team keeps a keen eye on the latest trends and emerging products to ensure you have access to the most exciting and innovative items on the market.
                        </p>
                    </fieldset>
                </div>

                <div class="col-lg-4 mb-4 service-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Secure Shopping
                        </legend>
                        <p class="fs-14">
                            We value your privacy and security. Our website is designed with state-of-the-art security measures to protect your information and ensure safe transactions.
                        </p>
                    </fieldset>
                </div>
                <div class="col-lg-4 mb-4 service-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Fast and Reliable Shipping
                        </legend>
                        <p class="fs-14">
                            We understand the excitement of receiving your purchases promptly. That's why we partner with reliable shipping carriers to ensure your orders are delivered to your doorstep in the shortest time possible.
                        </p>
                    </fieldset>
                </div>

                <div class="col-lg-4 mb-4 servic-bx">
                    <fieldset class="rounded-3 p-3">
                        <legend class="float-none w-auto px-3 mb-0 fs-6 fw-bold">
                            Socially Responsible
                        </legend>
                        <p class="fs-14">
                            When you shop with us, you contribute to making a positive impact. A percentage of every purchase goes towards supporting charitable initiatives and environmental causes.
                        </p>
                    </fieldset>
                </div>


            </div>


        </div>
    </div>
</div>

@endsection
