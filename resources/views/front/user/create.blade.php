@extends('layouts.app')

@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" rel="stylesheet" type="text/css">
    @endsection
@section('content')

<div class="row page-title clearfix">

    <div class="page-title-left">
        <h6 class="page-title-heading mr-0 mr-r-5">Kulanıcı</h6>
    </div>

    <div class="page-title-right d-none d-sm-inline-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Panel</a>
            </li>
            <li class="breadcrumb-item active">Kulanıcı</li>
        </ol>
        <div class="d-none d-md-inline-flex justify-center align-items-center"><a href="javascript: void(0);" class="btn btn-color-scheme btn-sm fs-11 fw-400 mr-l-40 pd-lr-10 mr-l-0-rtl mr-r-40-rtl hidden-xs hidden-sm ripple" target="_blank">Yeni Kulanıcı Ekle</a>
        </div>
    </div>

</div>

@if (session("status"))

<div class="row mt-3">

    <div class="col-md-12">
        <div class="alert alert-success">{{session('status')}}</div>
    </div>

</div>

@endif


<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <form enctype="multipart/form-data" action="{{route('user.store',$data)}}" method="post" autocomplete="off">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label class="col-form-label" for="l0">Kullanıcı Adı</label>
                                    <input name="name" class="form-control"  type="text" required>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label" for="l0">Kullanıcı Şifre</label>
                                    <input name="password" class="form-control"  type="password" required>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label" for="l0">Kullanıcı Email</label>
                                    <input name="email" class="form-control"  type="email" required>
                            </div>

                        </div>


                        <div class="form-actions mt-2">
                            <div class="form-group row">
                                <div class="col-md-12 ml-md-auto btn-list">
                                    <button class="btn btn-primary btn-rounded" type="submit">Kullanıcı Ekle</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
    </div>
    <!-- /.row -->
</div>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
    @endsection
