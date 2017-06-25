@extends('layouts.app')

@section('content')
  <div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">Welcome, {{ Auth::user()->name }}!</div>
              <div class="panel-body">
                @if (Auth::user()->meals->isEmpty())
                  Looks like you haven't logged any meals today.
                  <a href='/meals/create'>You should change that!</a>
                @else
                Today's Meals:
                  <ul class='list-group'>
                	@foreach (Auth::user()->meals as $meal)
                    @if (Auth::user()->isToday($meal->created_at))
                		<li class='list-group-item'>
                		{{ $meal->name }}
                    {{ $meal->created_at->format('h:m A') }}
                		</li>
                    @endif
                	@endforeach
                @endif
              </div>
          </div>
      </div>
  </div>
  </div>
@endsection
