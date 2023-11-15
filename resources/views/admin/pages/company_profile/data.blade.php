@extends('admin.layouts.layout-dashboard')
@section('content')
    <!-- Page-header end -->

    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Extended</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-primary outline-alert" role="alert">
            {{ session('success') }}
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> --}}
        </div>
    @endif
    <div class="main-wrapper">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>

                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                @include('admin.pages.company_profile.form.profile')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-scripts')
    <script>
        function previewImageCompany() {
            const image = document.querySelector('#imagecompany');
            const imgprev = document.querySelector('.img-preview-company');
            imgprev.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgprev.src = oFREvent.target.result;
            }
        }

        function previewImageLogo() {
            const image = document.querySelector('#logocompany');
            const imgprev = document.querySelector('.img-preview-logo');
            imgprev.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgprev.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
