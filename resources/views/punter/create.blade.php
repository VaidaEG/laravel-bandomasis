@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Punter</div>
                <div class="card-body">
                    <form method="POST" action="{{route('punter.store')}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="punter_name">
                            <small class="form-text text-muted">Please enter punter name.</small>
                        </div>
                        <div class="form-group">
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="punter_surname">
                            <small class="form-text text-muted">Please enter punter surname.</small>
                        </div>
                        <div class="form-group">
                            <label>Bet:</label>
                            <input type="text" class="form-control" name="punter_bet">
                            <small class="form-text text-muted">Please enter the sum of punter bets.</small>
                        </div>
                        <div class="form-group">
                            <label>Horse name:</label>
                            <select class="form-control" name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}">{{$horse->name}}</option>
                            @endforeach
                        </select>
                            <small class="form-text text-muted">Please choose the horse for bet.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection