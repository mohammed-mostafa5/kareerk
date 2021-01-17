<?php

namespace App\Repositories\AdminPanel;

use App\Models\Chat;
use App\Repositories\BaseRepository;

/**
 * Class ChatRepository
 * @package App\Repositories\AdminPanel
 * @version January 13, 2021, 4:07 pm EET
*/

class ChatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'created_by',
        'latest_message'
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
        return Chat::class;
    }
}
