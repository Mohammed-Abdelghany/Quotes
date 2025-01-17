@extends('layouts.main')
@section('title')

Quote {{$quote['id']}}
@endsection
@if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  
@endif
@section('content')

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Quote</th>
      </tr>
    </thead>
    <tbody>
      
  
        <tr>
          <td>{{$quote['id']}}</td>
          <td>{{$quote['author']}}</td>
          <td>{{$quote['quote']}}.</td>
        </tr>
    
        <tfoot>
          <tr>
            <td colspan="3" class="text-center">
            <div class="btn-group" role="group" aria-label="Actions" style="display: inline-flex;">
              <!-- Edit Button -->
              <a href="{{ route('quote.edit', $quote['id']) }}" 
                 class="btn btn-outline-info btn-lg" 
                 style="margin-right: 10px; width:90px;color:">
                  <i class="fa fa-edit"></i> Edit
              </a>

              <!-- Delete Button -->
              <form method="POST" action="/quotes/delete" style="margin: 0;">
                  @csrf
                  <input type="hidden" name="quote-id" value="{{ $quote['id'] }}">
                  <button type="submit" class="btn btn-outline-danger btn-lg">
                      <i class="fa fa-trash"></i> Delete
                  </button>
              </form>
          </div>
            </td>
          </tr>
        </tfoot>
        
    </tbody>
    </table>
    @endsection
