@extends('layouts.frontend.master')

@section('title', 'Contact Us')

@section('css')
<style>
    #contactUsForm label {
        font-size: 0.875rem;
    }

    #contactUsForm input,
    textarea {
        font-size: 0.813rem !important;
    }

    textarea {
        height: 100px !important;
        resize: none;
    }
</style>
@endsection

@section('content')
<div class="sec-contact py-5">
    <div class="container">
        <div class="row g-4 my-2">
            <h2 class="cmn-ttl text-uppercase mb-4">
                Get In Touch with Us
            </h2>
            <div class="col-lg-12 contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.9647316651367!2d96.15921381469421!3d16.77843018844623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec867a9fe0a3%3A0xe85d969168d86e66!2sRealistic%20Infotech%20Group!5e0!3m2!1sen!2smm!4v1671285359065!5m2!1sen!2smm" width="100%" height="475" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div><!-- /.row -->

        <div class="row mx-0 px-4 px-md-0 py-0 py-md-5">
            <div class="left-content-bx col-md-12 col-lg-5 px-0 pe-lg-4 mb-0">
                <div class="heading-bx mb-5">
                    <h2 class="fw-900 text-uppercase">
                        <small class="fs-14">Get In Touch with Us</small>
                        <span class="fs-5 d-block">Contact Info</span>
                    </h2>
                </div>

                <div class="col-12 d-flex align-items-start mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center fs-4 me-4 icon-bx">
                        <i class="ri-map-pin-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Location</h5>
                        <p>
                            <a href="#">No. 801, Kan Yeik Mon Condo,Hlaing Township,<br class="d-none d-lg-block"> Yangon, Myanmar</a>
                        </p>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-start mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center fs-4 me-4 icon-bx">
                        <i class="ri-mail-send-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Email Address</h5>
                        <p>
                            <a href="#">services@rig-info.com</a>
                        </p>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-start mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center fs-4 me-4 icon-bx">
                        <i class="ri-headphone-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Call Us</h5>
                        <p>
                            <a href="#">+95 9 953 933826</a>
                        </p>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-start mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center fs-4 me-4 icon-bx">
                        <i class="ri ri-globe-line"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Website</h5>
                        <p>
                            <a href="https://rig-info.com/" target="_blank">www.rig-info.com</a>
                        </p>
                    </div>
                </div>
            </div><!-- /.left-content-bx -->

            <div class="right-content-bx col-md-12 col-lg-7 px-0 ps-lg-5 mt-5 mt-lg-0">
                <div class="heading-bx mb-5">
                    <h2 class="fw-900 text-uppercase">
                        <small class="fs-14">We'll Be In Touch As Soon As Possible</small>
                        <span class="fs-5 d-block">Contact Form</span>
                    </h2>
                </div>

                <form class="contact-form fs-14" action="{{ route('frontend.contact-us.submit') }}" method="POST" id="contactUsForm">
                @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0" id="name" placeholder="Enter Your Username" name="username" autocomplete="off">
                        <label for="name">Username</label>
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0" id="subject" placeholder="Enter Your Subject" name="subject" autocomplete="off">
                        <label for="subject">Subject</label>
                        <small class="text-danger">{{ $errors->first('subject') }}</small>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0" id="email" placeholder="Enter Your Email Address" name="email" autocomplete="off">
                        <label for="email">Email Address</label>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control rounded-0" id="message" placeholder="Please Leave Your Message" name="message" style="height: 120px;" autocomplete="off"></textarea>
                        <label for="message">Message</label>
                        <small class="text-danger">{{ $errors->first('message') }}</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark rounded-0 text-uppercase px-4 fs-14 fw-bold custom-py-12">
                            Send Message
                        </button>
                    </div>
                </form>
            </div><!-- /.right-content-bx -->
        </div><!-- /.row -->
    </div>
</div>
@endsection
