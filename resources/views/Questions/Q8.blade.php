@extends('inc.layout')
@section('title')
    8
@endsection
@section('main')
    @if ($errors->any()) 
        <div class="alert alert-fill-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p style="padding: 1px">{{ $error }}</p>
            @endforeach
        </div> 
    @endif


    <form method="POST" action="{{ route('Q8') }}">
        @csrf
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="">
        <br>
        <br>
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" id="">
        <br>
        <br>
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="">
        <br>
        <br>
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" id="">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
@endsection
