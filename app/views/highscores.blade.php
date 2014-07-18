@extends('layout')


<div class="col-sm-6 col-sm-offset-2">
@if($randnum != "")

	@if($percent < 1)
	<h1>YOU FRIGGIN LUCKY DOG</h1>
	@elseif($percent < 5)
	<h1>So Close.</h1>
	@elseif($percent < 10)
	<h1>Top 10%. Still an A-.</h1>
	@elseif($percent < 20)
	<h1>So Close, yet so Far.</h1>
	@elseif($percent < 40)
	<h1>Not bad. Sort of. Kind of.</h1>
	@elseif($percent < 60)
	<h1>Top 60 percent. Still better than your English Grades.</h1>
	@elseif($percent < 70)
	<h1>Probably should skip the casinos.</h1>
	@else
	<h1>I couldn't even do that bad on purpose.</h1>
	@endif
	<h1 class='blue'>{{ number_format($randnum) }}
	<h2>Your Number Ranks in the top <span class="blue">{{ $percent }}%</span></h2>

{{ Form::open(array('action'=>'HomeController@newNumber')) }}
{{ Form::hidden('name', $name)}}
<br>
{{ Form::submit('Do it Again', array('class'=>'btn btn-info btn-width'))}}
{{ Form::close() }}

@else
<h1>Highscores</h1>
@endif

<hr>
<h3><span style="font-weight:300">Average:</span> {{ $average }}</h3>
<hr>
<table class="table">
	<tr>
		<th>Rank</th>
		<th>Name</th>
		<th>Score</th>
	</tr>
	<?php $i = $everything->getFrom(); ?>
@foreach($everything as $thing)
	<tr>
		<td>{{ $i }}</td>
		<td>{{ $thing->name }}</td>
		<td>{{ number_format($thing->number) }}</td>
		<?php $i++ ?>
	</tr>
@endforeach

</table>
{{ $everything->links() }}
</div>