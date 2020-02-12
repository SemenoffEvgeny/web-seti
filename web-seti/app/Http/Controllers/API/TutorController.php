<?php declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TutorCreateRequest;
use App\Http\Services\TutorService;
use App\Models\Tutor;
use Illuminate\Http\{Response, JsonResponse};

/**
 * Class TutorController
 * @package App\Http\Controllers\API
 */
class TutorController extends Controller
{
    /**
     * @var TutorService
     */
    protected $tutorService;
    /**
     * @var Tutor
     */
    protected $tutor;

    /**
     * TutorController constructor.
     * @param TutorService $tutorService
     * @param Tutor $tutor
     */
    public function __construct(TutorService $tutorService, Tutor $tutor)
    {
        $this->tutorService = $tutorService;
        $this->tutor= $tutor;
    }

    /**
     * @param TutorCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TutorCreateRequest $request):JsonResponse
    {
        $result = $this->tutorService->create($request->all());

        return \response()->json(['message' => 'Tutor was created!', $result],
            Response::HTTP_CREATED);
    }
}
