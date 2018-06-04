@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}

        {!! Form::label('content', 'タスク一覧:') !!}
        {!! Form::text('content') !!}

       
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}


    {!! Form::close() !!}

@endsectionS