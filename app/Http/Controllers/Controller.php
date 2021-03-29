<?php
namespace App\Http\Controllers;

use App\Sequence\TestPipeline;
use App\Sequence\TestRequestPayload;
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
     * @var TestPipeline
     */
    protected TestPipeline $testPipeline;

    /**
     * @param TestPipeline $testPipeline
     */
    public function __construct(TestPipeline $testPipeline)
    {
        $this->testPipeline = $testPipeline;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function testPost(Request $request): JsonResponse
    {
        $payload = (new TestRequestPayload())->hydratePost($request->post());
        $response = $this->testPipeline->process(TestPipeline::TEST_PIPELINE, $payload)->format();

        return response()->json($response, $response['status_code']);
    }
}
