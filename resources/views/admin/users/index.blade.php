@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <div class="col-md-6"><h3>申报单位用户管理</h3></div>
                <div class="col-md-6"><a href="{{route('users.create')}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i>添加新用户</a></div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>用户ID</th>
                    <th>单位代码</th>
                    <th>申报单位</th>
                    <th>登录用户名</th>
                    <th>联系人姓名</th>
                    <th>联系电话</th>
                    <th>用户类型</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->corporation->code}}</td>
                        <td>{{$user->corporation->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->cellphone}}</td>
                        <td>{{$user->roles->first()->name}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}" class="edit">编辑</a> <a href="{{route('users.destroy', $user->id)}}" class="delete">删除</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="box-footer">
                <div class="pull-left footer-left">共 {{$users->lastPage()}} 页, {{$users->total()}} 个用户</div>
                <div class="pull-right footer-right">{{$users->links()}}</div>
                <script>
                    var listPage = {{$users->currentPage()}};
                </script>
            </div>

            <!-- Delete -->
            {!! Form::open(['url' => '#', 'method' => 'DELETE', 'id' => 'delete-form']) !!}
            {!! Form::close() !!}
            <!-- Modal -->
            <div class="modal fade" id="delete-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">确认删除该用户吗?</h4>
                        </div>
                        <div class="modal-body">
                            删除后将不可恢复。
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default cancel-delete">返回</button>
                            <button type="button" class="btn btn-primary confirm-delete">确定删除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
