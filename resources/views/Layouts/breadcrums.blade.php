<h3 class="page-title"> {{ $breadcrums['Page_title'] }}
    <small>{{ $breadcrums['Page_title_info'] }}</small>
</h3>
<div class="page-bar">
    @if ($breadcrums['Breadcrums'])
        <ul class="page-breadcrumb">
        @foreach ($breadcrums['Breadcrums'] as $key=>$bread)
            <li>
            @if ($key == 0)
                <i class="fa fa-home"></i>
            @endif
            @if (isset($bread['url']))
                <a href="{{$bread['url']}}" class='menueClickHijack'>{{$bread['title']}}</a>
                <i class="fa fa-angle-right"></i>
            @else
                <span>{{$bread['title']}}</span>
            @endif
            </li>
        @endforeach
        </ul>
    @endif
    @section('action')
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#"><i class="icon-bell"></i> Action</a>
                </li>
                <li>
                    <a href="#"><i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#"><i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#"><i class="icon-bag"></i> Separated link</a>
                </li>
            </ul>
        </div>
    </div>
    @stop
</div>

<script type="text/javascript"> var dataTableControler = null; </script>