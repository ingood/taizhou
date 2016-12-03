@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 main-content">
            <div class="box-header">
                <h3 class="text-center">项目基本情况</h3>
            </div>
            <div class="box-content">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <td class="table-label">项目名称:</td>
                        <td>{{$project->xmmc}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">项目名称(英文):</td>
                        <td>{{$project->xmmcyw}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">主题词:</td>
                        <td>{{$project->ztc}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">成果登记号码:</td>
                        <td>{{$project->cgdjhm}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">推荐奖励类别:</td>
                        <td>{{$project->tjjllb}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">项目名称可否公布:</td>
                        <td>{{$project->xmmckfgb? '是' : '否'}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">任务来源:</td>
                        <td>{{join('; ',$options['rwly'])}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">所属国民经济行业:</td>
                        <td>{{join('; ',$options['ssgmjjhy'])}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">计划(基金)名称和编号:</td>
                        <td>{{$project->jhmchbh}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">研究起止时间:</td>
                        <td>{{$project->yjqssj}} 至 {{$project->yjwcsj}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">推荐单位:</td>
                        <td>{{$project->tjdw}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">学科分类代码:</td>
                        <td>{{$project->xkfldm}} {{$project->xkflmc}}</td>
                    </tr>
                    <tr>
                        <td class="table-label">成果分类代码:</td>
                        <td>{{$project->cgfldm}} {{$project->cgflmc}}</td>
                    </tr>
                </table>
            </div>
            @role('xmfzr')
            <div class="box-footer">
                <div class="footer-center">
                    <a href="{{route('projects.edit', $project->id)}}" class="btn btn-primary">修改</a>
                </div>
            </div>
            @endrole
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">确认离开此页面吗?</h4>
                        </div>
                        <div class="modal-body">
                            如果离开此页面, 您将丢失尚未保存的内容。
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                            <button type="button" class="btn btn-primary cancel" href="{{route('users.index')}}">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 hidden-xs sidebar">
            @include('projects.sidebar')
        </div>
    </div>
</div>
@endsection
