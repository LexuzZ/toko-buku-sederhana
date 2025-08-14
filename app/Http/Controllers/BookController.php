<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'limit' => 'nullable|integer|in:10,20,30,40,50,60,70,80,90,100',
            'search' => 'nullable|string|max:100',
        ]);
        $limit = $request->input('limit', 10);
        $search = $request->input('search', '');
        $page = $request->input('page', 1);
        $cacheKey = "books_list_limit_{$limit}_search_{$search}_page_{$page}";
        $books = Cache::remember($cacheKey, 600, function () use ($limit, $search) {
            $query = Book::query()
                ->select(
                    'books.id',
                    'books.title',
                    'books.author_id',
                    DB::raw('COUNT(ratings.id) as voters'),
                    DB::raw('AVG(ratings.rating) as average_rating')
                )
                ->join('ratings', 'books.id', '=', 'ratings.book_id')
                ->with('author')
                ->groupBy('books.id', 'books.title', 'books.author_id');

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('books.title', 'like', "%{$search}%")
                        ->orWhereHas('author', function ($authorQuery) use ($search) {
                            $authorQuery->where('name', 'like', "%{$search}%");
                        });
                });
            }

            return $query->orderByDesc('average_rating')
                ->orderByDesc('voters')
                ->limit($limit)
                ->get();
        });
        return view('books.index', [
            'books' => $books,
            'limit' => $limit,
            'search' => $search,
        ]);
    }


    public function topAuthors()
    {
        $topAuthors = Cache::remember('top_authors_v2', 3600, function () {
            return DB::table('authors')
                ->select(
                    'authors.id',
                    DB::raw('MIN(authors.name) as name'), // Ambil nama penulis
                    DB::raw('count(ratings.id) as popular_voters_count')
                )
                ->join('books', 'authors.id', '=', 'books.author_id')
                ->join('ratings', 'books.id', '=', 'ratings.book_id')
                ->where('ratings.rating', '>', 5)
                ->groupBy('authors.id')
                ->orderByDesc('popular_voters_count')
                ->limit(10)
                ->get();
        });

        return view('authors.top', ['authors' => $topAuthors]);
    }

    public function createRating()
    {
        $authors = Author::orderBy('name')->get();
        return view('ratings.create', ['authors' => $authors]);
    }

    public function storeRating(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => [
                'required',
                Rule::exists('books', 'id')->where(function ($query) use ($request) {
                    return $query->where('author_id', $request->author_id);
                }),
            ],
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $validated['book_id'],
            'rating' => $validated['rating'],
        ]);


        Cache::flush();
        return redirect()->route('books.index')
            ->with('success', 'Terima kasih! Rating Anda telah berhasil disimpan.');
    }

    public function getBooksByAuthor($authorId)
    {
        $author = Author::find($authorId);

        if (!$author) {
            return response()->json([], 404);
        }

        $books = $author->books()->orderBy('title')->get(['id', 'title']);

        return response()->json($books);
    }
}
