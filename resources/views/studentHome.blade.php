<?php
    if (Auth::check())
    {
        $user = App\User::find(Auth::id());
    }
?>        

@extends('inside.student.studentHomeTemplate')


@section('content')
    @include('inside.student.pages.studentHomeContent')
@endsection