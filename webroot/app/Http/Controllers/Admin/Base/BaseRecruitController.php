<?php

namespace App\Http\Controllers\Admin\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecruitRequest;
use App\Models\Experience;
use App\Models\Recruit;
use App\Services\ImageService;

class BaseRecruitController extends Controller
{
    private ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    protected function storeRecruit(RecruitRequest $request): void
    {
        /** @var Recruit $recruit */
        $recruit = Recruit::query()->create($request->validated());
        $this->saveAllExperience($request, $recruit);
        $this->imageService->saveImage($request, $recruit);
    }

    protected function updateRecruit(RecruitRequest $request, Recruit $recruit): void
    {
        $recruit->update($request->validated());
        $this->saveAllExperience($request, $recruit);
        $this->imageService->updateImage($request, $recruit);
    }

    protected function saveRecruitExperience(RecruitRequest $request, Experience $experience): void
    {
        $experience->fill($request->input('work'));
        $experience->save();
    }

    protected function saveAllExperience(RecruitRequest $request, Recruit $recruit): void
    {
        $this->saveRecruitExperience($request, $recruit->work());
        $this->saveRecruitExperience($request, $recruit->education());
        $this->saveRecruitExperience($request, $recruit->course());
    }
}
