<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\settings;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{
    protected $site_settings;
    protected $navbar_sections;
    protected $sliders;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->site_settings = Settings::first();

        // navsections
        View::share([
            'site_settings' => $this->site_settings,

        ]);
    }
}
