
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                LaraBBS
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!--leftSide of Navbar-->
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('topics.index')}}"></a></li>
                <li><a href="{{route('categories.show',1)}}">分享</a></li>
                <li><a href="{{route('categories.show',2)}}">教程</a></li>
                <li><a href="{{route('categories.show',3)}}">问答</a></li>
                <li><a href="{{route('categories.show',4)}}">公告</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            @guest
                <!--这个用户未认证,那么就显示登录注册按钮-->

                    <li><a href="{{route('login')}}">登录</a></li>
                    <li><a href="{{route('register')}}">注册</a></li>

                @else
                <!--用户已认证,那么就显示用户菜单-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{Auth::user()->avatar}}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                             {{Auth::user()->name}}<span class="caret"></span>
                        </a>
                        <ul class = "dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('users.show', Auth::id()) }}">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    个人中心
                                </a>
                            </li>
                            <li>
                            <li>
                                <a href="{{route('users.edit',Auth::id())}}">编辑资料</a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">退出登录</a>
                                <form id = "logout-form" method="POST"   STYLE="display: none;" action="{{route('logout')}}">
                                    {{csrf_field()}}
                                </form>
                            </li>

                        </ul>
                    </li>

            @endguest
            </ul>

        </div>
    </div>
</nav>