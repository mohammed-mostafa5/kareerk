<?php

namespace App\Repositories\AdminPanel;

use App\Models\FeaturedFreelancer;
use App\Repositories\BaseRepository;

/**
 * Class FeaturedFreelancerRepository
 * @package App\Repositories\AdminPanel
 * @version March 2, 2021, 10:22 am EET
*/

class FeaturedFreelancerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'freelancer_id',
        'start_at',
        'end_at',
        'value'
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
        return FeaturedFreelancer::class;
    }
}
