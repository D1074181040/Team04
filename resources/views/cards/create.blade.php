@extends('app')
@section('title','新增卡片資料')
@section('topic','建立一筆住戶資料')
@section('contents')
    {{--{!! Form::open(['url'=>'cards/store'])!!}
<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_name','住戶姓名:') !!}
    {!! Form::text('p_name',$residents,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_time','通行時間:') !!}
    {!! Form::text('p_time',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('status','狀態:') !!}
    {!! Form::text('status',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit('新增卡片資料',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close()!!}
{!! Form::open(['url'=>'cards/store'])!!}
<div class="form-group">
    {!! Form::label('n_ID','卡號:') !!}
    {!! Form::text('n_ID',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_name','住戶姓名:') !!}
    {!! Form::select('p_name',$residents,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('p_time','通行時間:') !!}
    {!! Form::date('p_time',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::label('status','狀態:') !!}
    {!! Form::text('status',null,['class'=>'form-control' ]) !!}
</div>
<div class="form-group">
    {!! Form::submit('新增卡片資料',['class'=>'btn btn-primary form-control']) !!}
</div>
--}}
    @include('message.list')
{!! Form::open(['url'=>'cards/store']) !!}
    @include('cards.form',['submitButtonText'=>'新增卡片資料'])
{!! Form::close()!!}
@endsection
