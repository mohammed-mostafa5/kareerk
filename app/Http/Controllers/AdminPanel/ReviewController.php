<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::get();

        return view('adminPanel.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = ProductReview::find($id);

        return view('adminPanel.reviews.show', compact('review'));
    }

    public function addToHome($id)
    {
        $review = ProductReview::find($id);
        $review->update(['in_home' => 1]);

        return back();
    }

    public function removeFromHome($id)
    {
        $review = ProductReview::find($id);
        $review->update(['in_home' => 0]);

        return back();
    }
}
