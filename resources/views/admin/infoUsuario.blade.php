@extends('layouts/adminLayout')
@section('title', $user->name.' Info')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="row">
                <div class="wrapper">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TOP 10 <span class="label label-danger">RAW</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i =1?>
                                    @foreach($superstarsRaw as $superstarRaw)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarRaw->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarRaw->name}}</b></p>
                                    </div>
                                    <?php $i++?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TOP 10 <span class="label label-primary">Smackdown</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i =1?>
                                    @foreach($superstarsSmackdown as $superstarSmack)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarSmack->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarSmack->name}}</b></p>
                                    </div>
                                    <?php $i++?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TOP 10 <span class="label label-warning">Pay-Per-View</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i =1?>
                                    @foreach($superstarsPpv as $superstarPpv)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarPpv->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarPpv->name}}</b></p>
                                    </div>
                                    <?php $i++?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 