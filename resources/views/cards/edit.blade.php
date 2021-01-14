@extends('app')
@section('title','修改卡片資料')
@section('topic','修改一筆住戶的資料')
@section('contents')
{{--卡片編號:{{$id}}<br/>--}}
{{--{!! Form::open(['url'=>'cards/update/'.$id,'method'=>'patch'])!!}
<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',$n_ID,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_time','通行時間:') !!}
    {!! Form::text('p_time',$p_time,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('status','狀態:') !!}
    {!! Form::text('status',$status,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit('更新卡片資料',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close()!!}--}}
@include('message.list')
{!!Form::model($card,['method'=>'PATCH','action'=>['\App\Http\Controllers\CardsController@update',$card->id]])!!}
@include('cards.form',['submitButtonText'=>'更新卡片資料'])
{!! Form::close()!!}
@endsection

