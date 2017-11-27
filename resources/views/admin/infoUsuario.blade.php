@extends('layouts/adminLayout')
@section('title', $user->name.'\'s Info')
@section('conteudo_principal')
    <div class="card-box">
        <div class="container-fluid">
            <div class="row">
            <h4 class="header-title m-t-0 m-b-30">Simple Info</h4>
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>WC</th>
                                </tr>
                            </thead>

                            <tbody>
                                    {{ csrf_field()  }}
                                    <tr>
                                        <td><img src="{{url($user->photo)}}" class="img-circle-admin-check" alt=""></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->wc}}</td>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="wrapper">
                <h4 class="header-title m-t-0 m-b-30">User Teams</h4>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TEAM <span class="label label-danger">RAW</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i=1; $cashRaw=$rawTeam->team_cash;$cashSmack=$smackdownTeam->team_cash;$cashPPV=$ppvTeam->team_cash;?>
                                    @foreach($superstarsRaw as $superstarRaw)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarRaw->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarRaw->name}}</b></p>
                                    </div>
                                    <?php $i++;$cashRaw+=$superstarRaw->price;?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TEAM <span class="label label-primary">Smackdown</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i =1?>
                                    @foreach($superstarsSmackdown as $superstarSmack)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarSmack->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarSmack->name}}</b></p>
                                    </div>
                                    <?php $i++;$cashSmack+=$superstarSmack->price;?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">TEAM <span class="label label-warning">Pay-Per-View</span></h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    <?php $i =1?>
                                    @foreach($superstarsPpv as $superstarPpv)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($superstarPpv->image)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$i.'º) '.$superstarPpv->name}}</b></p>
                                    </div>
                                    <?php $i++;$cashPPV+=$superstarPpv->price;?>
                                    @endforeach    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>User Market Data</th>
                                    <th><span class="label label-danger">RAW</span></th>
                                    <th><span class="label label-primary">Smackdown</span></th>
                                    <th><span class="label label-warning">Pay-Per-View</span></th>
                                </tr>
                            </thead>
                            

                            <tbody>
                                <tr>
                                    <td>Rank</td>
                                    <td>{{array_search($user->id, $positionRaw)+ 1}}º</td>
                                    <td>{{array_search($user->id, $positionSmackdown)+ 1}}º</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>Points</td>
                                    <td>{{$rawTeam->team_points}}</td>
                                    <td>{{$smackdownTeam->team_points}}</td>
                                    <td>{{$ppvTeam->team_points}}</td>
                                </tr>

                                <tr>
                                    <td>Total Points</td>
                                    <td>{{$rawTeam->team_total_points}}</td>
                                    <td>{{$smackdownTeam->team_total_points}}</td>
                                    <td>{{$ppvTeam->team_total_points}}</td>
                                </tr>

                                <tr>
                                    <td>Cash</td>
                                    <td>{{$cashRaw}}</td>
                                    <td>{{$cashSmack}}</td>
                                    <td>{{$cashPPV}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="wrapper">
                <h4 class="header-title m-t-0 m-b-30">User Icons</h4>
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                    @foreach($iconsComprados as $iconComprado)
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="{{url($iconComprado->img_url)}}" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author"><b>{{$iconComprado->name}}</b></p>
                                        </div>
                                    @endforeach    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 