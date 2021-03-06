@extends('layout')
<div class="col-md-6 col-md-offset-3 centered" id="main">
<h1>Welcome to 1 in a Billion</h1>

<div class="col-md-12" id="name">
<p>Click The Button Below to Generate a Number and top the highscore.</p>
{{ Form::open(array('action'=>'HomeController@newNumber')) }}
{{ Form::text('name', null, array('class'=>'form-control','id'=>'nameform','placeholder'=>'Enter your Name...'))}}
<br>
{{ Form::submit('Generate A Number', array('class'=>'btn btn-info btn-width'))}}
{{ Form::close() }}
<hr>
<h3><span style="font-weight:300">Average:</span> {{ $average }}</h3>
<hr>
</div>

<hr>
<table class="table centered" id="maintable">
	<tr>
		<th class="centered">Rank</th>
		<th class="centered">Name</th>
		<th class="centered">Score</th>
	</tr>
@foreach($everything as $thing)
	<tr>
		<td>{{ $i }}</td>
		<td>{{ $thing->name }}</td>
		<td>{{ number_format($thing->number) }}</td>
		<div class="hidden">{{ $i++ }}</div>
	</tr>
@endforeach
</table>
</div>