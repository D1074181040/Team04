@extends('app')
@section('title','單一卡片資料')
@section('contents')
@section('topic','顯示你所選取卡片的資料')
            卡號:{{$card->n_ID}}<br/>
            通行時間:{{$card->p_time}}<br/>
            狀態:{{$card->status}}<br/>
@endsection


