<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Cupom;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CupomRepository;
//use App\Validators\CupomValidator;

/**
 * Class CupomRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CupomRepositoryEloquent extends BaseRepository implements CupomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cupom::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
