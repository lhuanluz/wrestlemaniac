<!DOCTYPE html>
@extends('layouts/adminLayout')
@section('title', 'Dashboard')
@section('conteudo_principal')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Users</h3>
                    </div>
                    <div class="panel-body">
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#0c9550 "
                                    data-bgColor="#4af09c" value="{{$usuariosCadastrados}}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15" data-max="3000"/>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0"> {{$usuariosCadastradosHoje}} </h2>
                                <p class="text-muted">Registered Today</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
                <div class="panel panel-red panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">RAW  
                            @if($mercados->statusMercadoRaw == 'Aberto')
                            <span class="label label-success">Open</span>
                            @else
                            <span class="label label-danger">Closed</span>
                            @endif
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                data-bgColor="#F9B9B9" value="{{$timesDoRaw}}"
                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                data-thickness=".15" data-max="{{$usuariosCadastrados}}"/>
                            </div>

                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0">{{number_format(($timesDoRaw/$usuariosCadastrados)*100)}}%</h2>
                                <p class="text-muted">Teams Ready</p>
                            </div>
                        </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
                <div class="panel panel-blue panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">Smackdown Live   
                            @if($mercados->statusMercadoSmackdown == 'Aberto')
                            <span class="label label-success">Open</span>
                            @else
                            <span class="label label-danger">Closed</span>
                            @endif
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#5555ef"
                                    data-bgColor="#b9b9f9" value="{{$timesDoSmack}}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15" data-max="{{$usuariosCadastrados}}"/>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0">{{number_format(($timesDoSmack/$usuariosCadastrados)*100)}}%</h2>
                                <p class="text-muted">Teams Ready</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pay-Per-View 
                            @if($mercados->statusMercadoPPV == 'Aberto')
                            <span class="label label-success">Open</span>
                            @else
                            <span class="label label-danger">Closed</span>
                            @endif
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#FFBD4A"
                                    data-bgColor="#FFE6BA" value="{{$timesDoPPV}}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15" data-max="{{$usuariosCadastrados}}"/>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0">{{number_format(($timesDoPPV/$usuariosCadastrados)*100)}}%</h2>
                                <p class="text-muted">Teams Ready</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- end row -->
    <h4 class="page-title">TOP 10</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-red panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">TOP 10 <span class="label label-danger">RAW</span></h3>
                    </div>
                    <div class="panel-body">
                        <div class="inbox-widget nicescroll" style="height: 315px;">
                                <?php $i =1?>
                                @foreach($top10Raw as $superstarRaw)
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{url($superstarRaw->image)}}" class="img-circle" alt=""></div>
                                    <p class="inbox-item-author"><b>{{$i.'º) '.$superstarRaw->name}}</b></p>
                                    <p class="inbox-item-date"><span class="label label-danger">{{$superstarRaw->total}} picks</span></p>
                                </div>
                                <?php $i++?>
                                @endforeach    
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-blue panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title">TOP 10 <span class="label label-primary">Smackdown</span></h3>
                </div>
                <div class="panel-body">
                    <div class="inbox-widget nicescroll" style="height: 315px;">
                            <?php $i =1?>
                            @foreach($top10Smack as $superstarSmack)
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="{{url($superstarSmack->image)}}" class="img-circle" alt=""></div>
                                <p class="inbox-item-author"><b>{{$i.'º) '.$superstarSmack->name}}</b></p>
                                <p class="inbox-item-date"><span class="label label-primary">{{$superstarSmack->total}} picks</span></p>
                            </div>
                            <?php $i++?>
                            @endforeach    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
                <div class="panel panel-yellow panel-border">
                    <div class="panel-heading">
                        <h3 class="panel-title">TOP 10 <span class="label label-warning">Pay-Per-View</span></h3>
                    </div>
                    <div class="panel-body">
                        <div class="inbox-widget nicescroll" style="height: 315px;">
                            <?php $i =1?>
                            @foreach($top10Ppv as $superstarPpv)
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="{{url($superstarPpv->image)}}" class="img-circle" alt=""></div>
                                <p class="inbox-item-author"><b>{{$i.'º) '.$superstarPpv->name}}</b></p>
                                <p class="inbox-item-date"><span class="label label-warning">{{$superstarPpv->total}} picks</span></p>
                            </div>
                            <?php $i++?>
                            @endforeach    
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- end row -->
    <h4 class="page-title">USER CHAMPIONS</h4>
    <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-red panel-border text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">RAW CHAMPION</h3>
                    </div>
                    <div class="panel-body">
                        <img src="{{url($rawChampion->photo)}}" class="img-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">
                        <h3 class="panel-title">{{$rawChampion->days}} day(s)</h3>
                        <div class="text-left">
                                <p class="text-muted font-13"><strong>Name :</strong> <span class="m-l-15">{{$rawChampion->name}}</span></p>
                                <p class="text-muted font-13"><strong>Email :</strong><span class="m-l-15">{{$rawChampion->email}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                    <div class="panel panel-blue panel-border text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">SMACKDOWN CHAMPION</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{url($smackdownChampion->photo)}}" class="img-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">
                            <h3 class="panel-title">{{$smackdownChampion->days}} day(s)</h3>
                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Name :</strong> <span class="m-l-15">{{$smackdownChampion->name}}</span></p>
                                <p class="text-muted font-13"><strong>Email :</strong><span class="m-l-15">{{$smackdownChampion->email}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- end row -->
    <h4 class="page-title">WWE CHAMPIONS</h4>
    <div class="row">

        @foreach($champions as $champion)
            @if($champion->name == 'None')
            @else
            <div class="col-lg-2 col-md-6">
                @if($champion->brand == 'Raw')
                <div class="panel panel-red panel-border text-center">
                @else
                <div class="panel panel-blue panel-border text-center">
                @endif
                        <div class="panel-heading">
                            <h3 class="panel-title beltNameAdmin">{{$champion->belt}}</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{url($champion->image)}}" class="img-circle thumb-xl img-thumbnail m-b-10 championImageAdmin" alt="profile-image">
                            <h3 class="panel-title">{{$champion->name}}</h3>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <!-- end row -->
    <h4 class="page-title">ADMINS</h4>
    <div class="row">
        @foreach($admins as $admin)
        <div class="col-lg-4 col-md-6">
            <div class="card-box widget-user">
                <div>
                    <img src="{{$admin->photo}}" class="img-responsive img-circle" alt="user">
                    <div class="wid-u-info">
                        <h4 class="m-t-0 m-b-5 font-600">{{$admin->name}}</h4>
                        <p class="text-muted m-b-5 font-13">{{$admin->email}}</p>
                        @if($admin->user_power > 2)
                        <small class="text-warning"><b>
                        {{$admin->role}}
                        @elseif($admin->user_power == 2)
                        <small class="text-success"><b>
                        {{$admin->role}}
                        @else
                        <small class="text-info"><b>
                        {{$admin->role}}
                        @endif
                        </b></small>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        @endforeach
    </div>
    <!-- end row -->

@endsection 