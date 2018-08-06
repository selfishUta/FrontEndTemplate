@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">添加用户</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" id="addForm">
                            <div class="form-group">
                                <label for="inputUser" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputUser" placeholder="用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">权限等级</label>
                                <div class="col-sm-10">
                                    <div>
                                      <div class="radio3 radio-check radio-primary radio-inline">
                                        <input type="radio" id="rank1" name="rank" value="1" >
                                        <label for="rank1">
                                          特殊权限
                                        </label>
                                      </div>
                                      <div class="radio3 radio-check radio-success radio-inline">
                                        <input type="radio" id="rank2" name="rank" value="0" checked="">
                                        <label for="rank2">
                                          普通权限
                                        </label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a src="" class="btn btn-default">添加</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                    <th>用户名</th>
                                    <th>用户等级</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="typelist">
                                @foreach($listCols as $cols)
                                <tr>
                                    <td>{{$cols->title}}</td>
                                    <td>{{$cols->title}}</td>
                                    <td>
                                        <a href="{{url('admin/type/edit',['id'=>$cols->id])}}" class="glyphicon glyphicon-edit">编辑</a>
                                        <a href="{{url('admin/type/del',['id'=>$cols->id])}}" class="glyphicon glyphicon-remove-circle">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    function typeSave(){
        $.ajax({
            url:'{{url("admin/type/add")}}',
            data:$('#typeform').serialize(),
            type:'get',
            dataType:'json',
            success:function(re){
                var id = re.data.id;
                var title = re.data.title;
                var url = re.data.url;
                var item = '<tr><td>' + title + '</td><td>';
                item = item + '<a href="' + url + '/edit/' + id + '" class="glyphicon glyphicon-edit">编辑</a><a href="' + url + '/del/' + id + '" class="glyphicon glyphicon-remove-circle">删除</a></td></tr>';
                $('#typelist').append(item);
            }
        });
    }
</script>
@endsection

