<?php

namespace App\Repositories\AdminPanel;

use App\Models\ChatContact;
use App\Repositories\BaseRepository;

/**
 * Class ChatContactRepository
 * @package App\Repositories\AdminPanel
 * @version January 13, 2021, 4:10 pm EET
*/

class ChatContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'chat_id',
        'user_id',
        'other_user_id'
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
        return ChatContact::class;
    }
}
