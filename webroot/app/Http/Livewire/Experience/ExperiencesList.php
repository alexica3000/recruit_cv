<?php

namespace App\Http\Livewire\Experience;

use App\Models\Recruit;
use Livewire\Component;

/**
 * @property $experiences
 */
class ExperiencesList extends Component
{
    public const TYPE_WORK      = 'updateTypeWork';
    public const TYPE_EDUCATION = 'updateTypeEducation';
    public const TYPE_COURSE    = 'updateTypeCourse';

    public string $title;
    public string $field_name;
    public string $field_short;
    public $experiences;

    protected $listeners = [
//        'updateTypeCourse'    => 'updateTypeCourse',
    ];

    public function render()
    {
        return view('livewire.experience.experiences-list');
    }

    public function updateTypeCourse(Recruit $recruit)
    {
        $this->experiences = $recruit->educations;
    }
}
