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

    public function testPost(Request $request): JsonResponse
    {
        $whitelist = [
            'name',
            'age',
        ];

        $overrides = [
            'first_name' => 'name',
        ];

        $requestPayload = (new TestRequestPayload($whitelist, $overrides))->hydratePost($request->post());

        $response = $this->testPipeline
                         ->process(TestPipeline::TEST_PIPELINE, $requestPayload)
                         ->format();

        return response()->json($response, $response['status_code']);
    }
}
