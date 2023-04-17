<?php
namespace App\Http\Controllers;

use App\Sequence\DemoPipeline;
use App\Sequence\DemoPayload;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var DemoPipeline
     */
    protected DemoPipeline $testPipeline;

    /**
     * @param DemoPipeline $testPipeline
     */
    public function __construct(DemoPipeline $testPipeline)
    {
        $this->testPipeline = $testPipeline;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function testPost(Request $request): JsonResponse
    {
        $payload = (new DemoPayload())->hydratePost($request->post());
        $response = $this->testPipeline->process(DemoPipeline::DEMO_PIPELINE, $payload)->format();

        return response()->json($response, $response['status_code']);
    }
}
