@extends('app')
@section('title','修改住戶資料')
@section('contents')
@section('topic','修改一筆住戶的資料')
{{--住戶編號:{{$id}}<br/>
{!! Form::open(['url'=>'residents/update/'.$id,'method'=>'patch'])!!}
<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',$n_ID,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_name','姓名:') !!}
    {!! Form::text('p_name',$p_name,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','連絡電話:') !!}
    {!! Form::text('phone',$phone,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('gender','性別:') !!}
    {!! Form::text('gender',$gender,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('region','區域:') !!}
    {!! Form::text('region',$region,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('floor','樓層:') !!}
    {!! Form::text('floor',$floor,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit('更新住戶資料',['class'=>'btn btn-primary form-control']) !!}
</div>--}}
@include('message.list')
{!!Form::model($resident,['method'=>'PATCH','action'=>['\App\Http\Controllers\ResidentsController@update',$resident->id]])!!}
@include('residents.form',['submitButtonText'=>'更新住戶資料'])
{!! Form::close()!!}

@endsection

