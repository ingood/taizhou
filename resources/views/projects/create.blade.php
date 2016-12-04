@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 main-content">
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
                <!--- Form Field --->
                {!! Form::open(['route' => 'projects.store', 'id' => 'submit-form']) !!}
                <table class="table table-bordered">
                    {{--<tr>--}}
                        {{--<td class="table-label">申报单位:</td>--}}
                        {{--<td>{!! Form::select('corporation_id', $corporations, old('corporation_id'), ['placeholder' => '请选择单位名称', 'class'=>'form-control']) !!}</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td class="table-label">项目名称:</td>
                        <td>{!! Form::text('xmmc', old('xmmc'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">项目名称(英文):</td>
                        <td>{!! Form::textarea('xmmcyw', old('xmmcyw'), ['class'=>'form-control', 'rows'=>2]) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">主题词:</td>
                        <td>{!! Form::text('ztc', old('ztc'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">成果登记号码:</td>
                        <td>
                            <div class="col-md-6 input-col">{!! Form::text('cgdjhm', old('cgdjhm'), ['class'=>'form-control']) !!}</div>
                            <div class="col-md-6 input-col-info">例如:2006-1863</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">推荐奖励类别:</td>
                        <td>{!! Form::text('tjjllb', old('tjjllb'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">项目名称可否公布:</td>
                        <td>
                            <div class="checkbox no-margin">
                                <label>
                                    {!! Form::checkbox('xmmckfgb', true, old('xmmckfgb') ? old('xmmckfgb') : true) !!} 可以公布
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">任务来源:</td>
                        <td>
                                @foreach($options['rwly'] as $value=>$name)
                                <div class="checkbox no-margin col-sm-6 input-col">
                                    <label>
                                        {!! Form::checkbox('rwly[]', $value, is_array(old('rwly')) && in_array($value,old('rwly'))? true: false) !!} {{$name}}
                                    </label>
                                </div>
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">所属国民经济行业:</td>
                        <td>
                            @foreach($options['ssgmjjhy'] as $value=>$name)
                                <div class="checkbox no-margin col-sm-6 input-col">
                                    <label>
                                        {!! Form::checkbox('ssgmjjhy[]', $value, is_array(old('ssgmjjhy')) && in_array($value,old('ssgmjjhy'))? true: false) !!} {{$name}}
                                    </label>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">计划(基金)名称和编号:</td>
                        <td>{!! Form::text('jhmchbh', old('jhmchbh'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">研究起止时间:</td>
                        <td>
                            <div class="col-md-1 no-padding input-col-info text-center">起始</div>
                            <div class="col-md-3 input-col">{!! Form::text('yjqssj', old('yjqssj'), ['class'=>'form-control']) !!}</div>
                            <div class="col-md-1 no-padding input-col-info text-center">完成</div>
                            <div class="col-md-3 input-col">{!! Form::text('yjwcsj', old('yjwcsj'), ['class'=>'form-control']) !!}</div>
                            <div class="col-md-2 no-padding input-col-info">(如2002-02-02)</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">推荐单位:</td>
                        <td>{!! Form::text('tjdw', old('tjdw'), ['class'=>'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td class="table-label">学科分类代码:</td>
                        <td>
                            <div class="col-md-1 no-padding input-col-info text-center">代码</div>
                            <div class="col-md-11 input-col">
                            {!! Form::text('xkfldm', old('xkfldm'), ['class'=>'form-control']) !!}
                            </div>
                            <div class="input-divider"></div>
                            <div class="col-md-1 no-padding input-col-info text-center">名称</div>
                            <div class="col-md-11 input-col">
                                {!! Form::text('xkflmc', old('xkflmc'), ['class'=>'form-control']) !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-label">成果分类代码:</td>
                        <td>
                            <div class="col-md-1 no-padding input-col-info text-center">代码</div>
                            <div class="col-md-11 input-col">
                                {!! Form::text('cgfldm', old('cgfldm'), ['class'=>'form-control']) !!}
                            </div>
                            <div class="input-divider"></div>
                            <div class="col-md-1 no-padding input-col-info text-center">名称</div>
                            <div class="col-md-11 input-col">
                                {!! Form::text('cgflmc', old('cgflmc'), ['class'=>'form-control']) !!}
                            </div>
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
            <div class="box-footer">
                <div class="footer-center">
                    <a href="#" class="btn btn-primary submit">保存</a>
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">取消</a>
                </div>
            </div>

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
    </div>
</div>
@endsection
