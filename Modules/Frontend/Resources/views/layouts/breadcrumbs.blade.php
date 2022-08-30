<style>
    .breadcrumb {
        background-color: #e2e4e6;
        }
</style>

<nav class="main-breadcrumb" aria-label="breadcrumb">

    <ol class="breadcrumb ml-1 mr-1">

        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class='fa fa-home'></i> {{__("Home")}}</a></li>

        @if(isset($breadcrumbs))

            @if(!empty($breadcrumbs))

                @foreach($breadcrumbs as $breadcrumb)

                    <li class="breadcrumb-item {{$breadcrumb['class'] ?? ''}}">

                        @if(!empty($breadcrumb['url']))

                            <a href="{{url($breadcrumb['url'])}}">{{$breadcrumb['name']}}</a>

                        @else

                            {{$breadcrumb['name']}}

                        @endif

                    </li>

                @endforeach

            @endif

        @endif

    </ol>

</nav>

