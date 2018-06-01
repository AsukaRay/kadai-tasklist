@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}

        {!! Form::label('content', 'タスク一覧:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('追加') !!}

    {!! Form::close() !!}

@endsection