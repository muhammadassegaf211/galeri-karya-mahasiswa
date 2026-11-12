<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

class KaryaController extends Controller
{
    /**
     * Display the home page with gallery, hero, search, filter, and about section.
     */
    public function index()
    {
        $karya = Karya::all();
        $categories = Karya::categories();
        $stats = Karya::stats();

        return view('pages.home', compact('karya', 'categories', 'stats'));
    }

    /**
     * Display the detail page for a specific artwork.
     *
     * @param int|string $id
     */
    public function show($id)
    {
        $karya = Karya::findOrFail($id);
        $related = Karya::related($id, 3);
        $categories = Karya::categories();

        return view('pages.detail', compact('karya', 'related', 'categories'));
    }

    /**
     * Display the about page / redirect to about section.
     */
    public function about()
    {
        $stats = Karya::stats();
        return view('pages.about', compact('stats'));
    }
}
