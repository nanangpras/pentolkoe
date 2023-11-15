@extends('home.layouts.layout-pages')
@section('content')
<!-- LOGIN AREA START (Register) -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ltn__checkout-single-content-info">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <h6>Personal Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-item input-item-name ltn__custom-icon">
                                <input type="text" name="name" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-email ltn__custom-icon">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-password ltn__custom-icon">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-password ltn__custom-icon">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-postcode ltn__custom-icon">
                                <input type="text" name="postcode" placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-phone ltn__custom-icon">
                                <input type="text" name="phone" placeholder="Telphone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <h6>Provinsi</h6>
                            <div class="input-item provinsi_id">

                                <select name="province_id" id="province_id" class="nice-select">
                                    @foreach ($provinsi as $row)
                                        <option value="{{ $row['province_id'] }}">{{ $row['province'] }}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h6>Kota/Kabupaten</h6>
                            <div class="input-item selectCity">
                                <select class="nice-select" name="city_id" id="city_id"></select>
                            </div>
                            {{-- <div class="input-item" id="selectCityId">
                                <select class="form-control" name="kota_id" id="city_id"></select>
                                {{-- <select class="nice-select" name="kota_id" id="city_id">
                                </select> --}}
                            {{-- </div> --}}
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h6>Kecamatan</h6>
                            <div class="input-item selectKecamatan">
                                <select class="nice-select" name="kecamatan_id" id="kecamatan_id">
                            </div>
                            {{-- <div class="input-item">
                                    <option>Select Kecamatan</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="address" id="address" cols="30" rows="10">Alamat</textarea>
                            </div>
                        </div>
                    </div>
                    <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p>
                    <div class="btn-wrapper mt-0">
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Register</button>
                    </div>
                </form>
            </div>
            {{-- <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="#" class="ltn__form-box contact-form-box">
                        <input type="text" name="firstname" placeholder="First Name">
                        <input type="text" name="lastname" placeholder="Last Name">
                        <input type="text" name="email" placeholder="Email*">
                        <input type="password" name="password" placeholder="Password*">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password*">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            By clicking "create account", I consent to the privacy policy.
                        </label>
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <p>By creating an account, you agree to our:</p>
                        <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>
                        <div class="go-to-btn mt-50">
                            <a href="login.html">ALREADY HAVE AN ACCOUNT ?</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
@endsection
@push('after-scripts')
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
                            if (data) {
                                $("#city_id").empty();
                                $('#city_id').append('<option hidden>Select Kota</option>');
                                $("#city_id").css('display', 'block');
                                $.each(data,function (key,value) {
                                    $('.selectCity select[name="city_id"]').append('<option value="'+ value.city_id +'">' + value.type + ' ' + value.city_name + '</option>');
                                })
                            } else {
                                $("#city_id").empty();
                            }
                            // $('select[name="kota_id"]').empty();
                            // $("#selectCityId").css('display', 'block');
                            // $("#select-city").css('display', 'none');
                            // $("select[name='kota_id']").css('display', 'none');

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
                            if (data) {
                                $("#kecamatan_id").empty();
                                $("#kecamatan_id").append('<option hidden>Select Kecamatan</option>');
                                $("#kecamatan_id").css('display','block');
                                $.each(data,function (key,value) {
                                    $('.selectKecamatan select[name="kecamatan_id"]').append('<option value="'+ value.subdistrict_id +'"namakota="'+ value.city +' ' +value.subdistrict_name+ '">' + value.city + ' ' + value.subdistrict_name + '</option>');
                                })
                            } else {
                                $("#kecamatan_id").empty();
                            }

                            // $('select[name="subdistrict_id"]').empty();
                        }
                    })
                }else{
                    $('select[name="kecamatan_id"]').empty();
                }
            });
        });
    </script>
@endpush
