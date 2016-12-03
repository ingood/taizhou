@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <div class="col-md-6"><h3>申报项目</h3></div>
                <div class="col-md-6"><a href="{{route('projects.create')}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i>添加新项目</a></div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>项目ID</th>
                    <th>项目名称</th>
                    <th>填报日期</th>
                    <th>项目状态</th>
                    <th>查看项目详细</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->xmmc}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->status}}</td>
                        <td><a href="{{route('projects.show', $project->id)}}">浏览</a></td>
                        <td><a href="{{route('projects.destroy', $project->id)}}" class="delete">删除</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="box-footer">
                <div class="pull-left footer-left">共 {{$projects->lastPage()}} 页, {{$projects->total()}} 个项目</div>
                <div class="pull-right footer-right">{{$projects->links()}}</div>
                <script>
                    var listPage = {{$projects->currentPage()}};
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
                            <h4 class="modal-title" id="myModalLabel">确认删除该项目吗?</h4>
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
