@extends('layouts.app')

@section('content')
<div class="container">
  <div class="meal-info">
    <h2 style="display:inline" class="meal-name">{{ $meal->name }}</h2>
    <span  class="meal-time">
      Created: {{ $meal->created_at->format('F j, Y g:i a') }}
    </span>
    <br>
    <span class="meal-data label label-pill label-primary">
      {{ $meal->calculateCalories() }} kCal
    </span>&nbsp;
    <span class="meal-data label label-pill label-default">
      {{ $meal->calculateProtein() }}g Protein
    </span>&nbsp;
    <span class="meal-data label label-pill label-default">
      {{ $meal->calculateCarbs() }}g Carbohydrates
    </span>&nbsp;
    <span class="meal-data label label-pill label-default">
      {{ $meal->calculateFat() }}g Fat
    </span>
  </div>
  <hr>
  <h3>Foods</h3>
  @foreach ($meal->foods as $food)
  <li class='list-group-item'>
    {{ $food->name }}
    <span style="float:right">{{ $food->created_at->format('m-d-Y') }}</span>
  </li>
  @endforeach
  <hr>

  <form action="/meals/{{$meal->id}}/foods" method="post">

    <input type="hidden" name="_token" value="{{$meal->id}}">

    <div class="form-group row">
      <label for="name" class="col-sm-2 form-control-label">Food Name</label>
      <div class="col-sm-10">
        <input class="form-control"
        type="text"
        name="name"
        placeholder="Food Name"
        required
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="protein" class="col-sm-2 form-control-label">Protein</label>
      <div class="col-sm-10">
        <input class="form-control"
        type="number"
        name="protein"
        placeholder="Protein/g"
        required
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="carbs" class="col-sm-2 form-control-label">Carbohydrates</label>
      <div class="col-sm-10">
        <input class="form-control"
        type="number"
        name="carbs"
        placeholder="Carbohydrates/g"
        required
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="fat" class="col-sm-2 form-control-label">Fat</label>
      <div class="col-sm-10">
        <input class="form-control"
        type="number"
        name="fat"
        placeholder="Fat/g"
        required
        >
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary" value="submit" type="submit">Submit</button>
      </div>
    </div>
    {{ csrf_field() }}
  </form>

  @endsection
