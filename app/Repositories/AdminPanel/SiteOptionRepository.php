<?php

namespace App\Repositories\AdminPanel;

use App\Models\SiteOption;
use App\Repositories\BaseRepository;

/**
 * Class SiteOptionRepository
 * @package App\Repositories\AdminPanel
 * @version January 11, 2021, 12:22 pm EET
*/

class SiteOptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_duration',
        'deposit_percentage'
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
        return SiteOption::class;
    }
}
