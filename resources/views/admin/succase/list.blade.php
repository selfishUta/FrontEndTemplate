@extends('layouts/admin')
@section('container')         
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">公司成功案例列表</span>
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
                                    <th>案例名</th>
                                    <th>展示</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listCols as $cols)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$cols->title}}</td>
                                    <td>
                                        <a href="javascript:showById({{$cols->id}})" class="glyphicon glyphicon-eye-open">显示</a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/succase/edit',['id'=>$cols->id])}}" class="glyphicon glyphicon-edit">编辑</a>
                                        <a href="{{url('admin/succase/del',['id'=>$cols->id])}}" class="glyphicon glyphicon-remove-circle">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <!-- 点击某个案例显示内容区域 -->
                            <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title" id="title"></div>
                                        <div class="description" id="type"></div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row no-margin">
                                        <div class="col-sm-6">
                                            <div class="card primary">
                                                <div class="card-jumbotron no-padding">
                                                    <img src="" height="333" width="400" class="img-responsive" id="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <div class="card-body" id="description"></div>
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
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('admin')}}/js/card.js"></script>
<!-- 展示ajax -->
<script type="text/javascript">
    function showById(id){
        $.ajax({
            url:'{{url("admin/succase/showById")}}',
            data:'id='+id,
            type:'get',
            dataType:'json',
            success:function(re){
                console.log(re);
                if (re.status = 'success') {
                    image = re.data.image;
                    description = re.data.description;
                    type = re.data.type;
                    title = re.data.title;
                    $('#title').text('名称: '+title);
                    $('#type').text('类型: '+type);
                    $('#description').text('描述: '+description);
                    $('#image').attr('src','{{asset("upload")}}/' + image);
                }else {
                    console.log(re.status);
                }
            }
        });
    }
</script>
@endsection

