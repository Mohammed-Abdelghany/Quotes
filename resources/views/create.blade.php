@extends('layouts.main')
@section('title', 'ADD New quote')
@section('content')
<h1>Add New Quote</h1>
<form action="/quotes" method="POST">
  {{-- مهم جدا قبل اي فورم للامان --}}
  @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Quote</label>
    <textarea type="text" cols="30" rows="10" class="form-control" id="quote-text" name="quote-text"
      placeholder="Input quote">{{old('quote-text')}}</textarea>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Author</label>
    <input type="text" class="form-control" id="author-text" name="author-text" placeholder="Input Author"
      value="{{old('author-text')}}">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Add Quote</button>
</form>

@endsection