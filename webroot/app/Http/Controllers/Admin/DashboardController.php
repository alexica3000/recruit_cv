<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Recruit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function home(): View
    {
        $totalUsers = User::query()->count();
        $totalCompanies = Company::query()->count();
        $totalRecruits = Recruit::query()->count();

        return view('dashboard', compact('totalUsers', 'totalCompanies', 'totalRecruits'));
    }
}
