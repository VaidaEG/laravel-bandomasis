@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Horse</div>
                <div class="card-body">
                    <form method="POST" action="{{route('horse.update',[$horse->id])}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="horse_name" value="{{$horse->name}}">
                            <small class="form-text text-muted">Please edit horse name.</small>
                        </div>
                        <div class="form-group">
                            <label>Runs:</label>
                            <input type="text" class="form-control" name="horse_runs" value="{{$horse->runs}}">
                            <small class="form-text text-muted">Please edit number of horse runs.</small>
                        </div>
                        <div class="form-group">
                            <label>Wins:</label>
                            <input type="text" class="form-control" name="horse_wins" value="{{$horse->wins}}">
                            <small class="form-text text-muted">Please edit number of horse wins.</small>
                        </div>
                        <div class="form-group">
                            <label>About:</label>
                            <textarea id="summernote" name="horse_about" value="{{$horse->about}}"></textarea>
                            <small class="form-text text-muted">Please edid information about horse.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('DOMContentLoaded', (event) => {
    $('#summernote').summernote();
});
</script>
@endsection