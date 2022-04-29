<?php
namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index', ['books' => Book::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', ['categories' => Category::pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $cover_name = $this->uploadImage($request->cover);

        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'summary' => $request->summary,
            'cover' => $cover_name,
        ]);

        return redirect()->route('admin.book.index')->with('status', 'Book successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.detail', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'book' => $book,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $input = $request->all();
        if ($request->cover) {
            $input['cover'] = $this->uploadImage($request->cover);
        }

        $book->update($input);

        return redirect()->route('admin.book.index')->with('status', 'Book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.book.index')->with('status', 'Book successfully deleted');
    }

    private function uploadImage($book_cover)
    {
        $file_name = Str::random(32) . '.' . $book_cover->getClientOriginalExtension();
        $book_cover->move(public_path('images/book_cover'), $file_name);

        return $file_name;
    }
}
