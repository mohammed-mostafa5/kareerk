<?php

namespace App\Repositories\AdminPanel;

use App\Models\Category;
use App\Repositories\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories\AdminPanel
 * @version May 11, 2020, 11:33 am UTC
*/

class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return Category::class;
    }
}
