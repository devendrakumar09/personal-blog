@extends('app')
@section('css')
    <style>
        .wrapper {
    height: 100vh;
    background: #000;
    background: url("https://i.imgur.com/g63vXfd.jpg");
    background-size: cover;
    width: 100%
}

.overlay {
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.8)
}

.contact-us {
    margin-top: 50px;
    margin-bottom: 50px
}

.contact-us h3,
p {
    color: #fff
}

.address {
    margin-top: 14px !important;
    margin-left: 10px
}

.address span {
    color: #7B1FA2
}

.icons {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    display: inline-block;
    display: flex;
    justify-content: center;
    align-items: center
}

.icons i {
    font-size: 20px
}

.forms {
    padding: 20px
}

.inputs input {
    margin-bottom: 13px;
    border: none;
    border-bottom: 2px solid #eee
}

.inputs input:focus {
    margin-bottom: 13px;
    border: none;
    border-bottom: 2px solid #7B1FA2;
    box-shadow: none
}

.inputs textarea {
    margin-bottom: 13px;
    border: none;
    border-bottom: 2px solid #eee;
    width: 100%;
    resize: none
}

.inputs textarea:focus {
    margin-bottom: 13px;
    border: none;
    border-bottom: 2px solid #7B1FA2;
    box-shadow: none;
    resize: none
}

.form-control {
    padding: .375rem .25rem
}
    </style>
@endsection
@section('main')

<div class="wrapper mt-4">
    <div class="overlay">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9">
                <div class="contact-us text-center">
                    <h3>Contact Us</h3>
                    <p class="mb-5">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-5 text-center px-3">
                                <div class="d-flex flex-row align-items-center"> <span class="icons"><i class="fa fa-map-marker"></i></span>
                                    <div class="address text-left"> <span>Address</span>
                                        <p>461, Sugar camp, San jose, California, USA</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mt-3"> <span class="icons"><i class="fa fa-phone"></i></span>
                                    <div class="address text-left"> <span>Phone</span>
                                        <p>501 205 2929</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mt-3"> <span class="icons"><i class="fa fa-envelope-o"></i></span>
                                    <div class="address text-left"> <span>Address</span>
                                        <p>contact@bbbootstrap.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center px-1">
                                <div class="forms p-4 py-5 bg-white">
                                    <h5>Send Message</h5>
                                    <div class="mt-4 inputs"> <input type="text" class="form-control" placeholder="Name"> <input type="text" class="form-control" placeholder="Email"> <textarea class="form-control" placeholder="Type your message"></textarea> </div>
                                    <div class="button mt-4 text-left"> <button class="btn btn-dark">Send</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection