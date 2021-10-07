@extends('master')
@section('inline-css')
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <style>
        .register {
            padding: 6px 15px;
            background-color: transparent;
            color: black !important;
            border: none;
            border-radius: 8px;
            box-shadow: 0px 3px 12px 7px #80808047;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 svg_img_login mt-5 pt-4">
                <img src="{{ asset('assets/img/login.svg') }}" alt="svg login page">
            </div>
            <div class="col-md-6 pt-4 mt-5 mb-5">
                <div class="top_title">
                    <h1> Welcome to family </h1>
                    <p>A work place to over 1.2 million semi skilled freelancers<br> from across the globe</p>

                </div>
                <div class="signup_form">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="top_img_u m-auto">
                            <label for="upload_u">
                                <i class="fas fa-image"></i>
                            </label>
                            <input type="file" name="image" id="upload_u" accept="image/*" hidden>

                            <p class="mt-2">Add a pic</p>
                        </div>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="all_info m-auto">
                            <div class="input_info">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="in_con">
                                    <p>Name</p>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Type your name"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="input_info">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="in_con">
                                    <p>Email Address</p>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="explain@gmail.com" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="input_info">
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="in_con">
                                    <p>Password</p>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        placeholder="Enter a password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="input_info">
                                <div class="icon">
                                    <i class="fas fa-globe-asia"></i>
                                </div>
                                <div class="in_con">
                                    <p>Select country</p>
                                    <select name="country" required>
                                        <option value="">Select country</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Argentina">Argentina </option>
                                        <option value="Brazil">Brazil</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="bottom_con">
                            <div class="bottom_agree">
                                <p>I want to:</p>
                                <div class="select_want d-flex" id="myDIV">
                                    <p class="btn">Hire for project</p>
                                    <p class="btn active">Work as a freelancer</p>
                                </div>
                                <input type="checkbox">
                                <span>I agree to <a href="">terms and conditions</a></span>
                            </div>
                            <div class="submit_btn d-flex">
                                <input type="submit" value="Sign Up Now">
                                <a href="{{ route('login') }}" class="register">Sign In Now</a>
                            </div>

                            <div class="login_with  m-auto">
                                <p class="mt-4 mb-0">Or get log in with</p>
                                <div class="d-flex">
                                    <div class="icon_with">
                                        <img src="https://img.icons8.com/fluency/48/4a90e2/facebook-circled.png" />
                                    </div>
                                    <div class="icon_with">
                                        <img src="https://img.icons8.com/material-sharp/48/fa314a/google-plus.png" />
                                    </div>
                                    <div class="icon_with">
                                        <img src="https://img.icons8.com/ios-filled/50/4a90e2/twitter-circled--v1.png" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('inline-js')
    <script src="{{ asset('assets/js/signup.js') }}"></script>
@endsection
