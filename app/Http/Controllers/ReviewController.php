<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('dashboard', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $validated = $request->validate([
            'title' => ['string', 'required', 'max:100'],
            'movie' => ['string', 'required', 'max:100'],
            'year' => ['integer', 'min:1888', 'max:' . date("Y")], // maximum is the current year
            'body' => [''],
            'again' => ['in:0,1'],
            // 'recommend' => ['in:0,1'],
            'rating' => ['numeric', 'min:1.0', 'max:10.0'],
        ]);

        $validated['user_id'] = Auth::id();
        $validated['slug'] = $this->make_slug($validated['title'], $validated['movie'], $validated['year']);

        Review::create($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('review.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $validated = $request->validate([
            'title' => ['string', 'required', 'max:100'],
            'body' => [''],
            'again' => ['in:0,1'],
            // 'recommend' => ['in:0,1'],
            'rating' => ['numeric', 'min:1.0', 'max:10.0'],
        ]);

        $validated['slug'] = $this->make_slug($validated['title'], $review->movie, $review->year);

        $review->update($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect('dashboard');
    }



    // custom function for generating a slug
    static public function make_slug(string $title, string $movie, string $year)
    {
        $slug = strtolower(implode('-', array_slice(explode('-', preg_replace('/[^a-zA-Z0-9-]/', '-', $title . '-' . $movie . '-' . $year)), 0, 7)));

        if (strlen($slug) > 50) {
            $slug = substr($slug, 0, -50);
        }
        $slug = trim(preg_replace('/-+/', '-', $slug), '-');

        return $slug;
    }
}
