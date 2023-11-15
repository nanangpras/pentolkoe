<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Login - Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito Sans:400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ url('themes/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('themes/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ url('themes/assets/css/connect.min.css') }}" rel="stylesheet">
    <link href="{{ url('themes/assets/css/dark_theme.css') }}" rel="stylesheet">
    <link href="{{ url('themes/assets/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="auth-page sign-in">

    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="auth-form">
                        <div class="row">
                            <div class="col">
                                <div class="logo-box"><a href="#" class="logo-text">Register Member</a></div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" aria-describedby="emailHelp"
                                            placeholder="Enter name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" aria-describedby="emailHelp"
                                            placeholder="Enter email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                            id="password_confirmation" placeholder="Password Confirm" required autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="province_id" id="province_id" class="form-control">
                                            @foreach ($provinsi as $row)
                                                    <option value="{{ $row['province_id'] }}" name="{{ $row['province'] }}">{{ $row['province'] }}</option>
                                                @endforeach
                                                </select>
                                                @error('province_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-item">
                                            <select name="city_id" id="city_id" class="form-control">
                                                <option>Select Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-item">
                                            <div class="input-item">
                                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                                    <option>Select Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="postcode" name="postcode"
                                            class="form-control @error('postcode') is-invalid @enderror"
                                            value="{{ old('postcode') }}" aria-describedby="emailHelp"
                                            placeholder="Enter postcode">

                                        @error('postcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="address" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}" aria-describedby="emailHelp"
                                            placeholder="Enter address">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" aria-describedby="emailHelp"
                                            placeholder="Enter phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-submit">Daftar</button>
                                    <div class="auth-options">
                                        <div class="custom-control custom-checkbox form-group">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                        </div>
                                        <a href="#" class="forgot-link">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-xl-block">
                    <div class="auth-image"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ url('themes/assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('themes/assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ url('themes/ssets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('themes/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('themes/assets/js/connect.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('select[name="province_id"]').on('change',function () {
                let provinceid = $(this).val();
                if (provinceid) {
                    jQuery.ajax({
                        url:"/city/"+provinceid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            alert('ok');
                            $('select[name="city_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="city_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                            })
                        }
                    })
                }else{
                    $('select[name="city_id"]').empty();
                }
            });

            $('select[name="city_id"]').on('change',function () {
                let kecamatanid = $(this).val();
                if (kecamatanid) {
                    jQuery.ajax({
                        url:"/subdistrict/"+kecamatanid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);

                            $('select[name="kecamatan_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="kecamatan_id"]').append('<option value="'+ value.subdistrict_id +'" namakota="'+ value.city +' ' +value.subdistrict_name+ '">' + value.city + ' ' + value.subdistrict_name + '</option>');
                            })
                        }
                    })
                }else{
                    $('select[name="kecamatan_id"]').empty();
                }
            });
        });
    </script>
</body>

</html>
