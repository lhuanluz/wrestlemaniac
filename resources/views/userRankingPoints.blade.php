@extends('layouts/app')

@section('content')

<li  data-toggle="collapse" data-target="#ranking" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Ranking Cash <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="ranking">                    
                    <li class="{{route::is('rankUserCashRaw') ? 'active' : '' }}"><a href="{{route('rankUserCashRaw')}}"><i class="fa fa-book icon fa-lg"></i>Raw Rank</a></li>   
                    <li class="{{route::is('rankUserCashSd') ? 'active' : '' }}"><a href="{{route('rankUserCashSd')}}"><i class="fa fa-book icon fa-lg"></i>Sd Rank</a></li>
                    <li class="{{route::is('rankUserCashPpv') ? 'active' : '' }}"><a href="{{route('rankUserCashPpv')}}"><i class="fa fa-book icon fa-lg"></i>Ppv Rank</a></li>   
                              
                </ul>

                <li  data-toggle="collapse" data-target="#rankingP" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Ranking Points <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="rankingP">                    
                    <li class="{{route::is('rankUserRawPoints') ? 'active' : '' }}"><a href="{{route('rankUserRawPoints')}}"><i class="fa fa-book icon fa-lg"></i>Raw Rank</a></li>   
                    <li class="{{route::is('rankUserSdPoints') ? 'active' : '' }}"><a href="{{route('rankUserSdPoints')}}"><i class="fa fa-book icon fa-lg"></i>Sd Rank</a></li>
                    <li class="{{route::is('rankUserPpvPoints') ? 'active' : '' }}"><a href="{{route('rankUserPpvPoints')}}"><i class="fa fa-book icon fa-lg"></i>Ppv Rank</a></li>                        
                </ul>
                <li  data-toggle="collapse" data-target="#rankingPT" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Ranking Points Total<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="rankingPT">                    
                    <li class="{{route::is('rankUserRawPointsTotal') ? 'active' : '' }}"><a href="{{route('rankUserRawPointsTotal')}}"><i class="fa fa-book icon fa-lg"></i>Raw Rank</a></li>   
                    <li class="{{route::is('rankUserSdPointsTotal') ? 'active' : '' }}"><a href="{{route('rankUserSdPointsTotal')}}"><i class="fa fa-book icon fa-lg"></i>Sd Rank</a></li>
                    <li class="{{route::is('rankUserPpvPointsTotal') ? 'active' : '' }}"><a href="{{route('rankUserPpvPointsTotal')}}"><i class="fa fa-book icon fa-lg"></i>Ppv Rank</a></li>                        
                </ul>
{{$cont=1}}
  <div class="container">
  <h2>{{$brand}} Points Ranking</h2>                         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$cont++}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->team_points}}</td>
      </tr>  
      
      @endforeach    
    </tbody>
  </table>
</div>
@endsection