@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form</li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <p class="page-desc">Input data dengan benar</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input User</h5>
                    <form action="{{route('user.update-role',$editUser->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama User</label>
                                    <input type="text" name="name" value="{{$editUser->name}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email User</label>
                                    <input type="email" name="email" value="{{$editUser->email}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="email" name="email" value="{{$editUser->phone}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role</label>
                                    <select class="js-states form-control" name="role_id[]" tabindex="-1" style="display: none; width: 100%" multiple="multiple">
                                        @foreach ($role as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Permission</label>
                                    <select class="js-states form-control" name="permission_id[]" tabindex="-1" style="display: none; width: 100%" multiple="multiple">
                                        @foreach ($permission as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('after-scripts')
<script src="{{url('themes/assets/js/pages/select2.js')}}"></script>
@endpush

