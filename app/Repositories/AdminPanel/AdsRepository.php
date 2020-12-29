<?php

namespace App\Repositories\AdminPanel;

use App\Models\Ads;
use App\Repositories\BaseRepository;

/**
 * Class AdsRepository
 * @package App\Repositories\AdminPanel
 * @version June 4, 2020, 11:59 am UTC
*/

class AdsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page'
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
        return Ads::class;
    }
}
