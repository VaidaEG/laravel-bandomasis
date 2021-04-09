@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Horse</div>
                <div class="card-body">
                    <form method="POST" action="{{route('horse.store')}}">
                        <div class="form-group">
                            <label>Horse name:</label>
                            <input type="text" class="form-control" name="horse_name">
                            <small class="form-text text-muted">Please enter horse name.</small>
                        </div>
                        <div class="form-group">
                            <label>Runs:</label>
                            <input type="text" class="form-control" name="horse_runs">
                            <small class="form-text text-muted">Please enter number of runs.</small>
                        </div>
                        <div class="form-group">
                            <label>Wins:</label>
                            <input type="text" class="form-control" name="horse_wins">
                            <small class="form-text text-muted">Please enter number of wins.</small>
                        </div>
                        <div class="form-group">
                            <label>About:</label>
                            <textarea id="summernote" name="horse_about"></textarea>
                            <small class="form-text text-muted">Please enter more information about horse.</small>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">ADD</button>
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