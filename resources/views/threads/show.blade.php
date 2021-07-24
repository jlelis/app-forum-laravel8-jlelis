@extends('layouts.app')
@section('content')
    <div class="row">
        {{--Tópicos--}}
        <dviv class="col-12">

            <div class="col-12">
                <h2>{{$thread->title}}</h2>
                <hr>

            </div>
            <div class="card">
                <div class="card-header">
                    <small>Criado por: {{$thread->user->name}} a {{$thread->created_at->diffForHumans()}}</small>
                </div>
                <div class="card-body">
                    {{$thread->body}}
                </div>
                <div class="card-footer">
                    <a href="{{route('threads.edit',$thread->slug)}}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger"
                       onclick="event.preventDefault(); document.querySelector('.thread-remove').submit()">Remover</a>

                    <form action="{{route('threads.destroy',$thread->slug)}}" class="thread-remove" method="post"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <hr>

        </dviv>

        {{--Resposta --}}
        <div class="col-12">
            <h5>Respostas:</h5>
            <hr>
            @forelse($thread->replies as $reply)
                <div class="card" style="margin-bottom: 15px">
                    <div class="card-body">
                        {{$reply->reply}}
                    </div>
                    <div class="card-footer">
                        <small> Respondido por: {{$reply->user->name}} a {{$reply->created_at->diffForHumans()}}</small>
                    </div>
                </div>

            @empty
            @endforelse
        </div>
        {{--Form respostas--}}
        <div class="col-12">
            <hr>
            <form action="{{route('replies.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                    <label for="">Responder:</label>
                    <textarea name="reply" id="reply" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Responder</button>
                    <button type="reset" class="btn btn-warning">Limpar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
