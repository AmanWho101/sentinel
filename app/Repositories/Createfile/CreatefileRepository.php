<?php

namespace App\Repositories\Createfile;

use App\Models\Createfile\Createfile;
use InfyOm\Generator\Common\BaseRepository;

class CreatefileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Createfile::class;
    }
}
