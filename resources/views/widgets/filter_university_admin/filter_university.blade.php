<script type="text/javascript" src="http://yandex.st/jquery/1.7.2/jquery.js"></script>

<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">
            {{$review + $orders}}
        </span>
    </a>
    <ul class="dropdown-menu">

        <li class="header">Повідомлення:</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @if($review > 0)
                    <li>
                        <a href="#">
                            <i class="fa fa-archive text-aqua"></i> Нових відгуків: {{$review}}
                        </a>
                    </li>
                @endif

                    @if($orders > 0)
                <li>
                    <a href="#">
                        <i class="fa fa-users text-red"></i> Нових замовлень: {{$orders}}
                    </a>
                </li>
                    @endif
            </ul>
        </li>

    </ul>
</li>

@if(Sentinel::getUser())

    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <img src="/images/logo.jpg" class="user-image" />
            <span class="hidden-xs">{{ Sentinel::getUser()->email }}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="/images/logo.jpg" class="img-circle" />

                <p>
                    @foreach(Sentinel::getUser()->roles as $role)
                        {{$role->name}}
                        @endforeach
                    <small>@lang('sleeping_owl::lang.auth.since', ['date' => Sentinel::getUser()->created_at->format('d.m.Y')])</small>
                </p>
            </li>

        </ul>
    </li>

    <li>
        <a href="/" target="_blank">
            <i class="fa fa-btn fa-globe"></i> @lang('sleeping_owl::lang.links.index_page')
        </a>
    </li>
@endif



