<?php


?>
<!--这个是子模板,继承自父模板,app.blade.php-->
@extends('layouts.app')
@section('title','首页')
<!--下面是重写模块对应app.blade.php中的"yield('content')"-->
@section('content')
    <h1>这里是首页</h1>
@stop