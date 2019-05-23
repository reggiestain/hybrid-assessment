@extends('layouts.app')
@section('content')
<style>
    .contact-us{
        margin-top: 200px;
    }
    @media only screen and (max-width: 1600px)
    {
        .contact-us{
            margin-top: 200px;
        }
    }
    @media only screen and (max-width: 600px) {
        .contact-us{
            margin-top: 20px;
        }
    }
</style>
<div class="contact-us">
    <div class="container">
        <div class="contact-form">
            <div class="row">
                <div class="col-sm-7">  
                    <h4>Seams of African Pride</h4>
                    <form id="ajax-contact"  method="post" action="contact-form-mail.php" role="form">
                        <div class="messages" id="form-messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone*</label>
                                        <input id="form_phone" type="tel" name="phone"  class="form-control" placeholder="Please enter your phone*" required oninvalid="setCustomValidity('Plz enter your correct phone number ')"
                                               onchange="try {
                                                           setCustomValidity('')
                                                       } catch (e) {
                                                       }">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Send message">
                                </div>
                            </div>
                            <div class="row">
                                <!--<div class="col-md-12">
                                    <br>
                                    <small class="text-muted"><strong>*</strong> These fields are required.</small>
                                </div>-->
                            </div>
                        </div>

                    </form>

                </div>
                <div class="col-sm-5">
                   <!-- <div class="row col1">
                        <div class="col-xs-3">
                            <i class="fa fa-map-marker" style="font-size:16px;"></i>   Address
                        </div>
                        <div class="col-xs-9">
                            One Gateway Center, Suite 25500+,<br> Newark 23, NJ 10235
                        </div>
                    </div>-->

                    <div class="row col1">
                        <div class="col-sm-3">
                            <i class="fa fa-phone"></i>   Phone
                        </div>
                        <div class="col-sm-9">
                            +(27) 71 194 0214   or  +(27) 78 130 4587
                        </div>
                    </div>
                    <div class="row col1">
                        <div class="col-sm-3">
                            <i class="fa fa-fax"></i>    Fax  
                        </div>
                        <div class="col-sm-9">
                            123 123 4567
                        </div>
                    </div>
                    <div class="row col1">
                        <div class="col-sm-3">
                            <i class="fa fa-envelope"></i>   Email
                        </div>
                        <div class="col-sm-9">
                            <a href="mailto:info@davidmadanga.com">info@davidmadanga.com</a>
                        </div>
                    </div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.519477702246!2d28.137575714522253!3d-25.918162558698608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e956f8c1654317d%3A0x4e7fd1e1c5b0d1a9!2sMolware!5e0!3m2!1sen!2sza!4v1556226741399!5m2!1sen!2sza" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>  </div>
            </div>

        </div>
    </div>
</div>

@endsection
