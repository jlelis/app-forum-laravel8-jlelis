@extends('layouts.app')
@section('content')
    <div class="row">
        <dviv class="col-12">
            <h2>Editar Tópicos</h2>
            <hr>
            <div class="col-12">
                <form action="{{route('threads.update',$thread->slug)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control" value="{{$thread->title}}">
                    </div>
                    <div class="form-group">
                        <label>Coteudo Tópico: </label>
                        <textarea name="body" id="" cols="30" rows="10"
                                  class="form-control">{{$thread->body}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Atualizar Tópico</button>

                </form>
            </div>


        </dviv>
    </div>
@endsection
