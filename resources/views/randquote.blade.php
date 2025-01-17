    @extends('layouts.main')
    @section('title')
    Quote {{$quotes[$id]['id']}}
    @endsection
    @section('content')
    </head>
    <body>
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
              <td>{{$quotes[$id]['id']}}</td>
              <td>{{$quotes[$id]['author']}}</td>
              <td>{{$quotes[$id]['quote']}}.</td>
            </tr>
                </tbody>
        </table>
        <div class="button-container">
          <a class="button-link" href="/quotes/randome">Get Another Quote</a>
        </div>
@endsection

