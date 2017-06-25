@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">All Meals</div>
				<div class="panel-body">
					@if (!$meals->isEmpty())
					<ul class='list-group'>
						@foreach ($meals as $meal)
						<li class='list-group-item'>
							<a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
							<span style="float:right">{{ $meal->created_at->format('m-d-Y') }}</span>
						</li>
						@endforeach
						@else
						<li class='list-group-item'>
							You have no meals!
						</li>
					</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
