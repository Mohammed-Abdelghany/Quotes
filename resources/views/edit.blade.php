@extends('layouts.main')
@section('title','Edit Quote')

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
        <form  action="/quotes/{{$quote->id}}" method="POST">
          @csrf
          @method('PUT')
          <td class="td-edit">
          {{$quote['id']}}
          </td>
          <td class="td-edit">
            <textarea 
              class="edit-quote form-control" 
              cols="34" 
              rows="10" 
              name="author-text" 
              placeholder="Input author">{{$quote->author}}</textarea>
          </td>
          <td class="td-edit">
            <textarea 
              class="edit-quote form-control" 
              cols="34" 
              rows="10" 
              name="quote-text" 
              placeholder="Input quote text">{{$quote->quote}}</textarea>
          </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" style="text-align: center;">
          <button type="submit" class="btn btn-primary">Save</button>
        </td>
      </tr>
    </tfoot>
    </form>
  </table>
  
  @endsection




