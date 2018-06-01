@extends('layouts.app')

@section('content')

    <h1>id = {{ $tasklist->id }} のメッセージ詳細ページ</h1>

    <p>{{ $tasklist->content }}</p>

    {!! link_to_route('tasklists.edit', 'このメッセージ編集', ['id' => $tasklist->id]) !!}

    {!! Form::model($tasklist, ['route' => ['tasklist.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection