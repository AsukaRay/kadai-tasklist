@extends('layouts.app')

@section('content')

<table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasklist->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $tasklist->title }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $tasklist->content }}</td>
        </tr>
    </table>


{!! link_to_route('tasklists.edit', 'このメッセージを編集', ['id' => $tasklist->id], ['class' => 'btn btn-default']) !!}
    
{!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
    
@endsection