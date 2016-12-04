@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
            <div class="box-header">
                <div class="col-md-6"><h3>本项目曾获科技奖励情况</h3></div>
                <div class="col-md-6"><button class="btn btn-success btn-sm pull-right create-button"><i class="fa fa-plus"></i>添加</button></div>
            </div>
            @include('awards.create')
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>奖项ID</th>
                    <th>获奖项目名称</th>
                    <th>奖励年度</th>
                    <th>奖项名称</th>
                    <th>获奖等级</th>
                    <th>授奖部门</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($project->awards as $award)
                    <tr>
                        <td>{{$award->id}}</td>
                        <td>{{$award->name_project}}</td>
                        <td>{{$award->date}}</td>
                        <td>{{$award->name}}</td>
                        <td>{{$award->class}}</td>
                        <td>{{$award->organization}}</td>
                        <td>
                            <a href="{{route('awards.edit', $award->id)}}">编辑</a>
                            <a href="{{route('awards.destroy', $award->id)}}" class="delete">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="box-footer">
                <div class="footer-center">
                    <a href="{{route('projects.steps.edit', ['project'=>$project->id, '5'])}}" class="btn btn-primary">下一步</a>
                </div>
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
