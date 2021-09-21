@extends('layouts.frontend_master')

@section('content')
@section('title') Tag wise product @endsection
 @php
     function bn_price($str){
     $en=array(1,2,3,4,5,6,7,8,9,0);
     $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
     $str=str_replace($en,$bn,$str);
     return $str;
 }
 @endphp


 @endsection