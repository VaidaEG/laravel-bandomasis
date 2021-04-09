@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Punters List</div>
                <div class="card-body">
                    @foreach ($punters as $punter)
                        <li class="list-group-item list-line">
                            {{$punter->name}} {{$punter->surname}} {{$punter->bet}} bets on horse: {{$punter->punterHorse->name}}
                            <div>
                                <a class="btn btn-primary" href="{{route('punter.edit',[$punter])}}">EDIT</a>
                                <form style="display: inline-block;" method="POST" action="{{route('punter.destroy', [$punter])}}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection