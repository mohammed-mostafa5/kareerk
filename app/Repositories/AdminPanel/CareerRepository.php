<?php

namespace App\Repositories\AdminPanel;

use App\Models\Career;
use App\Repositories\BaseRepository;

/**
 * Class CareerRepository
 * @package App\Repositories\AdminPanel
 * @version February 25, 2021, 3:14 pm EET
*/

class CareerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Career::class;
    }
}
