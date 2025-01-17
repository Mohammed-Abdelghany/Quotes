<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Quotes;

class QuotesController extends Controller
{

  function index()
  {

    $quotes = Quotes::all();
    return view('allquotes', ['quotes' => $quotes]);
  }

  // function showQuote($quoteid)
  // {
  //   require_once '..\routes\data\quotes.php';

  //   if (isset($quoteid)) {
  //     $quote = collect($quotes)->firstWhere('id', $quoteid);
  //     if ($quote) {
  //       return view('quote', ['quote' => $quote]);
  //     } else {
  //       header('Location: /quotes');
  //       exit;
  //     }
  //   } else {
  //     header('Location: /quotes');
  //     exit;
  //   }
  // }

  function showQuote($quoteid)
  {

    if (is_numeric($quoteid)) {
      $quote = Quotes::find($quoteid);
      if ($quote) {
        return view('quote', ['quote' => $quote]);
      }
      return redirect('/quotes')->with('found', 'No Quote has this id');
    }
    return redirect('/quotes')->with('found', 'No Quote has this id');
  }

  function randQuote()
  {
    require_once '..\routes\data\quotes.php';

    $id = (int)rand(1, count($quotes) - 1);

    return view('randquote', ['quotes' => $quotes, 'id' => $id]);
  }
  function create()
  {

    return view('create');
  }
  function store(Request $request)
  {
    // dd($request->input('quote-text'), $request->input('author-text'));
    $request->validate(
      [
        'quote-text' => 'required|max:500|string|min:5',
        'author-text' => 'required|max:50|string|min:5',
      ],
      [
        'quote-text.required' => 'The quote field is required',
        'quote-text.max' => 'The quote field must not exceed 500 characters',
        'author-text.required' => 'The author field is required',
        'author-text.max' => 'The author field must not exceed 50 characters',
        'author-text.min' => 'The author field must exceed 5',
        'quote-text.min' => 'The quote field must exceed 5',
      ]
    );
    Quotes::create(
      [

        'quote' => $request->input('quote-text'),
        'author' => $request->input('author-text'),

      ]



    );
    return redirect()->back()->with('succsess', 'quotes saved');
    //
  }
  public function editQuote($quoteid)
  {
    $quote = Quotes::find($quoteid);
    if ($quote) {
      return view('edit', ['quote' => $quote]);
    } else {
      abort(404);
    }
  }

  function updateQuote(Request $request, $quoteId)
  {

    $quote = Quotes::find($quoteId);
    if (!$quote) {
      return redirect('/quotes')
        ->withErrors(['quote_id' => 'Quote not found']);
    }
    $validated = $request->validate(
      [
        'quote-text' => 'required|max:500|string|min:5',
        'author-text' => 'required|max:50|string|min:5',
      ],
      [
        'quote-text.required' => 'The quote field is required',
        'quote-text.max' => 'The quote field must not exceed 500 characters',
        'author-text.required' => 'The author field is required',
        'author-text.max' => 'The author field must not exceed 50 characters',
        'author-text.min' => 'The author field must exceed 5',
        'quote-text.min' => 'The quote field must exceed 5',
      ]
    );

    $quote->quote = $validated['quote-text'];
    $quote->author = $validated['author-text'];
    $quote->save();
    return redirect()->route('quote.id', $quoteId)
      ->with('success', 'Quote updated successfully');
  }
  public function deleteQuote(Request $requests)
  {
    $requests->validate(['quote-id' => 'required|exists:quotes,id', 'found' => 'wrong id']);
    $quoteId = $requests->input('quote-id');

    // Ensure the quote ID exists in the request and is valid
    // Find and delete the quote
    $quote = Quotes::find($quoteId);

    if ($quote) {
      $quote->delete();
      return redirect('/quotes')->with('success', 'Quote deleted successfully');
    }

    // If quote not found
    return redirect('/quotes')->withErrors('error', 'Quote not found');
  }
}