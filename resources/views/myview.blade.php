@extends('mylayout')
@section('title','Hello World')
@section('content')

<html>
{!! Form::open(['url'=>'/submit','method'=>'POST']) !!}

{!! Form::token() !!}

{!! Form::text('name','') !!}

{!! Form::text('email','') !!}

{!! Form::submit('submit','') !!}

{!! Form::close() !!}

</html>


@endsection

<!-- @push('scripts')
{!! Html:: script('js/myjs2.js') !!}
@endpush -->
