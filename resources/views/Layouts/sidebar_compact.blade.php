@if ($res['sidebar'])
 <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-compact " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    @foreach ($res['sidebar'] as $key=>$value)
    <li class="nav-item start ">
         <a href="{{$value['url']}}" class="nav-link nav-toggle {{$value['class']}}"> 
            <i class="{{$value['icon']}}"></i>
            <span class="title">{{$value['name']}}</span>
            <span class="sele"></span>
            <span class="arrow"></span>
        </a> 
        @if ($value['groupModules'])
        <ul class="sub-menu"> 
            @foreach ($value['groupModules'] as $key=>$modules)
            <li class="nav-item start ">
                <a href="{{$modules['url']}}" class="nav-link {{$modules['class']}}">
                    <i class="icon-bar-chart"></i>
                    <span class="title">{{$modules['name']}}</span>
                    <!--<span class="badge badge-success">1</span><span class="badge badge-danger">5</span>-->
                </a>
            </li>
            @endforeach           
        </ul> 
        @endif
    </li> 
    @endforeach
 </ul>
@endif 