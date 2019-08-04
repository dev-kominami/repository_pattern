<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Companies\CompaniesDataAccessRepositoryInterface;
use App\Http\Requests\CompaniesInputPost;

class CompaniesController extends Controller
{

    public function __construct(CompaniesDataAccessRepositoryInterface $companies) {
        $this->companies = $companies;
    }

    public function regist(CompaniesInputPost $request) {
        try {
            $result = $this->companies->regist($request->name, $request->address);
            return response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
