@extends('app')
@section('title','單一主戶資料')
@section('topic','顯示你所選取住戶的資料')
@section('contents')

卡號:{{$n_ID}}<br/>
姓名:{{$p_name}}<br/>
聯絡電話:{{$phone}}<br/>
性別:{{$gender}}<br/>
區域:{{$region}}<br/>
樓層:{{$floor}}<br/>
@endsection
