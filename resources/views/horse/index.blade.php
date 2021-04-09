@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Horse List</div>
                <div class="card-body">
                    @foreach ($horses as $horse)
                        <li class="list-group-item list-line">
                            {{$horse->name}} runs: {{$horse->runs}} wins: {{$horse->wins}}<br>
                            {!!$horse->about!!}
                            <div>
                                <a href="{{route('horse.edit', [$horse])}}" class="btn btn-primary">EDIT</a>
                                <form style="display: inline-block;" method="POST" action="{{route('horse.destroy', [$horse])}}">
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