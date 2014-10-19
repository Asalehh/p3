@extends('main')

@section('title')
Lorem Ipsum Generator
@stop

@section('content')
<H1>Lorem Ipsum Paragraphs</H1>




<div>
    {{Form::open()}}
    {{Form::label('How many paragraphs to generate?')}} <small>(Max. 6)</small><br />
    {{Form::number('paragraphCount')}}

    {{Form::submit('Generate')}}
    {{Form::close()}}
</div>

<div style="margin-top:50px;">
<p>
    {{$paragraph}}
</p>
</div>

@stop