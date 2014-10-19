@extends('main')


@section('title')
    Random Users Generator
@stop



@section('content')
<h1>Random Users Generator</h1>

{{Form::open(array('url' => '/user-generator', 'method' => 'POST'))}}
    {{Form::label('How many users to generate?')}} <small>(Max. 10)</small><br />
    {{Form::number('count')}}

    <br />
    {{Form::checkbox('birth')}} {{Form::label('Include Birthdate','')}}
    <br />
    {{Form::checkbox('address')}} {{Form::label('Include Address','')}}

    <br />
    {{Form::submit('Generate')}}


{{Form::close()}}



@if (isset($data))
	
	@for ($x = 0; $x < $count; $x++)

		<b>{{$data['name'][$x]}}</b><br />
		
		@if (!empty($data['birth'][$x]))
			{{$data['birth'][$x]}}
		@endif

		@if (!empty($data['address'][$x]))
			<address>
				{{$data['address'][$x]}}
			</address>
		@endif
		
	@endfor


@endif

@stop
