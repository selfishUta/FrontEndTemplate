<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-expand-toggle">
                <i class="fa fa-bars icon"></i>
            </button>
            <ol class="breadcrumb navbar-breadcrumb">
                <li class="active">后台管理</li>
            </ol>
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-th icon"></i>
            </button>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-times icon"></i>
            </button>
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">设置<span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li class="profile-img">
                        <img src="{{asset('admin')}}/img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
                    </li>
                    <li>
                        <div class="profile-info">
                            <h4 class="username">Emily Hart</h4>
                            <div class="btn-group margin-bottom-2x" role="group">
                                <a href="" type="button" class="btn btn-default"><i class="fa fa-user"></i> 用户信息</a>
                                <a href="{{url('admin/user/logout')}}" type="button" class="btn btn-default"><i class="fa fa-sign-out"></i>注销</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>