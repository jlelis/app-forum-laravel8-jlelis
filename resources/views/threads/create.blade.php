@extends('layouts.app')
@section('content')
    <div class="row">
        <dviv class="col-12">
            <h2>Criar Tópicos</h2>
            <hr>
            <div class="col-12">
                <form action="{{route('threads.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Coteudo Tópico: </label>
                        <textarea name="body" id="" cols="30" rows="10"
                                  class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Criar Tópico</button>

                </form>
            </div>


        </dviv>
    </div>
@endsection
