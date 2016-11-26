<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class BookController extends Controller {

  /**
   * Create new Book Instance
   *
   * @param Request $request
   * @return Response
   */
  public function saveBook(Request $request) {
    $book = new Book;
    $book->title = $request->title;
    $book->author = $request->author;
    $book->genre = $request->genre;
    $book->section = $request->section;
    $book->borrowed = false;

    $isSaved = $book->save();
    if ($isSaved) {
      return response()->json([
        'id' => $book->id,
        'title' => $book->title,
        'author' => $book->author,
        'genre' => $book->genre,
        'section' => $book->section,
        'borrowed' => $book->borrowed
      ]);
    }
  }
  
  public function retrieveAll() {
    return Book::all();
  }

  public function getBook($id) {
    return Book::find($id);
  }

  public function updateBook(Request $request, $id) {
    $book = Book::find($id);
    $book->title = $request->title;
    $book->author = $request->author;
    $book->genre = $request->genre;
    $book->section = $request->section;
    $book->borrowed = $request->borrowed;

    $isSaved = $book->save();

    if ($isSaved) {
      return response()->json([
        'id' => $book->id,
        'title' => $book->title,
        'author' => $book->author,
        'genre' => $book->genre,
        'section' => $book->section,
        'borrowed' => $book->borrowed
      ]);
    }
  }

  public function searchBook(Request $request) {
    $query = $request->q;
    $filterBy = '';
    if ($request->has('filterBy')) {
      $filterBy = $request->filterBy;
    }
    if ($filterBy == 'title' || $filterBy == 'author' || $filterBy == 'section') {
      $books = Book::where($filterBy, 'LIKE', "%$query%")
        ->where('borrowed', '!=', "1")
        ->get();
      return $books;
    }
    return [];
  }
}
