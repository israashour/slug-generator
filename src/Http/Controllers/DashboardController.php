<?php

namespace Slg\SlugGenerator\Http\Controllers;

use App\Models\SlugHistory;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Slg\SlugGenerator\SlugGenerator;

class DashboardController extends Controller
{
    /**
     * Show the dashboard home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You can customize the logic to display the dashboard home page here
        return view('dashboard.index');
    }

    /**
     * Show the slug generation history page.
     *
     * @return \Illuminate\View\View
     */
    public function slugHistory()
    {
        // Assuming you have a 'slug_history' table in your database to store history
        $slugHistory = SlugHistory::table('slug_history')->latest()->get();

        return view('dashboard.slug-history', compact('slugHistory'));
    }

    /**
     * Generate a slug and store it in the history.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generateSlug(Request $request)
    {
        // Get the input string from the request
        $inputString = $request->input('input_string');

        // Generate a slug using your SlugGenerator class
        $slug = SlugGenerator::generate($inputString);

        // Store the generated slug in your database history
        SlugHistory::table('slug_history')->insert([
            'input_string' => $inputString,
            'generated_slug' => $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('slug.history')->with('success', 'Slug generated and stored successfully.');
    }
}
