<?php

namespace App\Repositories\AdminPanel;

use App\Models\Package;
use App\Repositories\BaseRepository;

/**
 * Class PackageRepository
 * @package App\Repositories\AdminPanel
 * @version October 15, 2020, 12:54 pm UTC
*/

class PackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'duration'
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
        return Package::class;
    }
}
