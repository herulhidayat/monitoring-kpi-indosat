<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function dataSite() {
        return view ('pages.site-data');
    }
    public function transactionSite() {
        return view ('pages.site-transaction');
    }
}
