@extends('layouts.main')

@section('title','All Quotes')

@section('content')
@if (session('found'))
<div class="alert alert-danger">
  {{ session('found') }}
</div>
  
    
@endif
  <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Quote</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($quotes as $quote) 
      <tr>
        <td><a href="/quotes/{{$quote['id']}}">{{$quote['id']}}</a></td>
        <td><a href="/quotes/{{$quote['id']}}">{{$quote['author']}}</a></td>
        <td><a href="/quotes/{{$quote['id']}}">{{$quote['quote']}}.</a></td>
      </tr>
    @endforeach
  </tbody>

</table>
  @endsection
