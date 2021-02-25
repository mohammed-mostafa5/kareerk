<?php

namespace App\Repositories\AdminPanel;

use App\Models\CareerRequest;
use App\Repositories\BaseRepository;

/**
 * Class CareerRequestRepository
 * @package App\Repositories\AdminPanel
 * @version February 25, 2021, 3:26 pm EET
*/

class CareerRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'career_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'cv'
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
        return CareerRequest::class;
    }
}
