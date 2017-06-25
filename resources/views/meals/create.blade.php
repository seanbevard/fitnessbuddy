@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Another Meal</div>
                <div class="panel-body">
                        <form action="/users/{{ $user->id}}/meals" method="post">
                            <fieldset class="form-group">
                              <label for="name" >Add Meal</label>
                              <input name="name" class="form-control" placeholder="Meal" required>
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
