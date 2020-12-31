<?php

namespace App\Repositories\AdminPanel;

use App\Models\Freelancer;
use App\Repositories\BaseRepository;

/**
 * Class FreelancerRepository
 * @package App\Repositories\AdminPanel
 * @version December 30, 2020, 2:49 pm EET
*/

class FreelancerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'main_service_id',
        'expertise_level',
        'hourly_rate',
        'title',
        'overview',
        'photo',
        'city',
        'address'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Freelancer::class;
    }
}
