@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">公司服务列表</span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">
                        <div class="title">列表区域</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>服务名</th>
                                    <th>类型</th>
                                    <th>展示</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listCols as $cols)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$cols->title}}</td>
                                    <td>{{$cols->showTypeById($cols->typeid)}}</td>
                                    <td>
                                        <a href="javascript:showById({{$cols->id}})" class="glyphicon glyphicon-eye-open">显示</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/business/edit',['id'=>$cols->id])}}" class="glyphicon glyphicon-edit">编辑</a>
                                        <a href="{{url('admin/business/del',['id'=>$cols->id])}}" class="glyphicon glyphicon-remove-circle">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <!-- 点击某个服务显示内容区域 -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <div id="title" class="title"></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="content" class="text-indent">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('admin')}}/js/card.js"></script>
<!-- 展示ajax -->
<script type="text/javascript">
    function showById(id){
        $.ajax({
            url:'{{url("admin/business/showById")}}',
            data:'id='+id,
            type:'get',
            dataType:'json',
            success:function(re){
                console.log(re);
                if (re.status = 'success') {
                    $('#title').text(re.data.title);
                    $('#content').text(re.data.content);
                }else {
                    console.log(re.status);
                }
            }
        });
    }
</script>
@endsection

