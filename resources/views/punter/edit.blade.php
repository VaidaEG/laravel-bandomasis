@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Punter</div>
                <div class="card-body">
                    <form method="POST" action="{{route('punter.update',[$punter])}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="punter_name" value="{{$punter->name}}">
                            <small class="form-text text-muted">Please edit punter name.</small>
                        </div>
                        <div class="form-group">
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="punter_surname" value="{{$punter->surname}}">
                            <small class="form-text text-muted">Please edit punter surname.</small>
                        </div>
                        <div class="form-group">
                            <label>Bet:</label>
                            <input type="text" class="form-control" name="punter_bet" value="{{$punter->bet}}">
                            <small class="form-text text-muted">Please edit sum of punter bets.</small>
                        </div>
                        <div class="form-group">
                            <label>Horse:</label>
                            <select class="form-control" name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" @if($horse->id == $punter->horse_id)
                                selected @endif>{{$horse->name}}
                            </option>
                            @endforeach
                        </select>
                            <small class="form-text text-muted">Please edit the horse on wchich punter bets.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection