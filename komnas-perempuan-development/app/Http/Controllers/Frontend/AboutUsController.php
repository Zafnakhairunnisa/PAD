<?php

namespace App\Http\Controllers\Frontend;

/**
 * Class AboutUsController.
 */
class AboutUsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.about.index');
    }
}
