<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <div class="icon fa fa-paper-plane"></div>
                    <div class="title">栏目</div>
                </a>
                <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url('admin')}}">
                        <span class="icon fa fa-tachometer"></span><span class="title">首页</span>
                    </a>
                </li>
                <li class="panel panel-default dropdown">
                    <a data-toggle="collapse" href="#dropdown-element">
                        <span class="icon fa fa-desktop"></span><span class="title">公司服务管理</span>
                    </a>
                    <!-- Dropdown level 1 -->
                    <div id="dropdown-element" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('admin/business/add')}}">添加</a>
                                </li>
                                <li><a href="{{url('admin/business/list')}}">列表</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="panel panel-default dropdown">
                    <a data-toggle="collapse" href="#dropdown-form">
                        <span class="icon fa fa-file-text-o"></span><span class="title">案例管理</span>
                    </a>
                    <!-- Dropdown level 1 -->
                    <div id="dropdown-form" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('admin/succase/add')}}">案例添加</a>
                                </li>
                                 <li><a href="{{url('admin/type/list')}}">类型列表</a>
                                </li>
                                <li><a href="{{url('admin/succase/list')}}">案例列表</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <!-- Dropdown-->
                <li class="panel panel-default dropdown">
                    <a data-toggle="collapse" href="#component-example">
                        <span class="icon fa fa-cubes"></span><span class="title">留言管理</span>
                    </a>
                    <!-- Dropdown level 1 -->
                    <div id="component-example" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('admin/message/list')}}">列表</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li>
                    <a href="{{url('/')}}" target="blank">
                        <span class="icon fa fa-thumbs-o-up"></span><span class="title">公司首页</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>