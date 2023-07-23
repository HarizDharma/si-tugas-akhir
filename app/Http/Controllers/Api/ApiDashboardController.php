<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class ApiDashboardController extends Controller
{
    private $dashboardRepository;
    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
        $this->middleware('auth:sanctum');
    }
    public function  index() {
        $dashboard = $this->dashboardRepository->index('api');
        return response()->json($dashboard);
    }
}
