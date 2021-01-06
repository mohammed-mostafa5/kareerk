<?php

namespace App\Repositories\AdminPanel;

use App\Models\Job;
use App\Repositories\BaseRepository;

/**
 * Class JobRepository
 * @package App\Repositories\AdminPanel
 * @version January 3, 2021, 10:26 am EET
*/

class JobRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_id',
        'name',
        'description',
        'expertise_level',
        'visibility',
        'freelancers_count',
        'payment_type',
        'budget',
        'expected_time',
        'step',
        'status'
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
        return Job::class;
    }
}
