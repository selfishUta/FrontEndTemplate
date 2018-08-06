@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">用户留言</span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">
                        <div class="title">留言列表</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>邮箱</th>
                                    <th>留言时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listCols as $v)
                                <tr>
                                    <td>{{$v->username}}</td>
                                    <td>{{$v->phone}}</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{date('Y-m-d',$v->created)}}</td>
                                    <td>
                                        <a href="javascript:showById({{$v->id}})" class="glyphicon glyphicon-eye-open">查看</a>
                                        <a href="{{url('admin/message/del',['id'=>$v->id])}}" class="glyphicon glyphicon-remove-circle">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- 点击某个服务显示内容区域 -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
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
@endsection
@section('js')
<script type="text/javascript" src="{{asset('admin')}}/js/card.js"></script>
<!-- 展示ajax -->
<script type="text/javascript">
    function showById(id){
        $.ajax({
            url:'{{url("admin/message/showById")}}',
            data:'id='+id,
            type:'get',
            dataType:'json',
            success:function(re){
                console.log(re);
                if (re.status = 'success') {
                    $('#content').text(re.data.content);
                }else {
                    console.log(re.status);
                }
            }
        });
    }
</script>
@endsection

