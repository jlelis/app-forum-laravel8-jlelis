@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-s12">
            <h2>Tópicos</h2>
            <hr>
        </div>
        <div class="col-12">
            @forelse($threads as $thread)
                <ul>
                    <li>{{$thread->title}}</li>
                    <li>{{$thread->body}}</li>
                </ul>
            @empty
                <div class="alert alert-warning">
                    Nenhum registro encontrado!
                </div>
            @endforelse
        </div>
    </div>

@endsection
