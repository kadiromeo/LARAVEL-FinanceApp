@extends('layouts.app')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" rel="stylesheet" type="text/css">
    @endsection
@section('content')
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5">İşlem</h6>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Panel</a>
                </li>
                <li class="breadcrumb-item active">İşlem</li>
            </ol>
            <div class="d-none d-md-inline-flex justify-center align-items-center"><a href="javascript: void(0);" class="btn btn-color-scheme btn-sm fs-11 fw-400 mr-l-40 pd-lr-10 mr-l-0-rtl mr-r-40-rtl hidden-xs hidden-sm ripple" target="_blank">Yeni Tahsilat Ekle</a>
            </div>
        </div>
        <!-- /.page-title-right -->
    </div>

    @if(session("status"))
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
                <div class="alert alert-success">{{ session("status") }}</div>
            </div>
        </div>

    @endif

    <div class="widget-list">
        <div class="row">
            <div class="col-md-12 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <form action="{{ route('islem.store',['type'=>1]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="col-form-label" for="l0">Fatura Seçiniz</label>
                                    <select name="faturaId" class="m-b-10 form-control fatura" data-placeholder="Müşteri Seçiniz" data-toggle="select2">
                                        <option value="">Müşteri Seçiniz</option>
                                       @foreach(\App\Fatura::getList(FATURA_GELIR) as $k => $v)
                                       <option data-fiyat="{{\App\Fatura::getTotal($v['id'])}}"  data-musteriId="{{$v['musteriId']}}" value="{{$v['id']}}">{{$v['faturaNo']}} / {{\App\Musteriler::getPublicName($v['musteriId'])}} / {{\App\Fatura::getTotal($v['id'])}}</option>
                                       @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="col-form-label" for="l0">Müşteri Seçiniz</label>
                                    <select name="musteriId" class="m-b-10 form-control musteri" data-placeholder="Müşteri Seçiniz" data-toggle="select2">
                                        <option value="">Müşteri Seçiniz</option>
                                       @foreach(\App\Musteriler::all() as $k => $v)
                                            <option value="{{$v['id']}}">{{ \App\Musteriler::getPublicName($v['id']) }}</option>
                                           @endforeach
                                    </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-form-label" for="l0">İşlem Tarih</label>
                                    <input class="form-control" required name="tarih"  value="{{ date("Y-m-d") }}" type="date">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="l0">Hesap</label>
                                            <select name="Hesap" class="m-b-10 form-control" data-placeholder="Hesap Seçiniz" data-toggle="select2">
                                                <option value="0">Nakit</option>
                                               @foreach(\App\Banka::all() as $k => $v)
                                                    <option value="{{$v['id']}}"> {{$v['ad']}} </option>
                                                   @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="l0">Ödeme Şekli</label>
                                            <select name="odemeSekli" class="m-b-10 form-control" data-placeholder="Hesap Seçiniz" data-toggle="select2">
                                                <option value="0">Nakit</option>
                                                <option value="1">Banka</option>

                                               @foreach(\App\Banka::all() as $k => $v)
                                                    <option value="{{$v['id']}}"> {{$v['ad']}} </option>
                                                   @endforeach
                                            </select>
                                        </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="l0">Fiyat</label>
                                        <input type="text" name="fiyat" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="l0">Açıklama</label>
                                    <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="form-actions">
                                <div class="form-group row">
                                    <div class="col-md-12 ml-md-auto btn-list">
                                        <button class="btn btn-primary btn-rounded" type="submit">Kaydet</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".fatura").change(function(){
                var fiyat = $(this).find(":selected").attr('data-fiyat');
                var musteriId = $(this).find(":selected").attr('data-musteriId');
                $(".musteri").val(musteriId).trigger('change');
                $("input[name=fiyat]").val(fiyat);
            })
        });
    </script>

    @endsection
