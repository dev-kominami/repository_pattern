<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Jobs\JobsDataAccessRepositoryInterface;
use App\Http\Requests\JobsInputPost;


class JobsController extends Controller
{
    public function __construct(JobsDataAccessRepositoryInterface $jobs) {
        $this->jobs = $jobs;
    }

    public function regist(JobsInputPost $request)  {
        try {
            $result = $this->jobs->regist(
                $request->name,
                $request->category,
                $request->detail,
                $request->company_id
            );
            return $response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}