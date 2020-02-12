<?php declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Tutor;

/**
 * Class TutorService
 * @package App\Http\Services
 */
class TutorService
{
    /**
     * @var Tutor
     */
    protected $tutor;

    /**
     * TutorService constructor.
     * @param Tutor $tutor
     */
    public function __construct(Tutor $tutor)
    {
        $this->tutor = $tutor;
    }

    /**
     * @param array $request
     * @return Tutor
     */
    public function create(array $request):Tutor
    {
        $tutor = $this->tutor->create($request);
        $tutor->save();
        return $tutor;
    }
}
