<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class CorporationsRepository extends Repository
{

    public function model()
    {
        return 'App\Corporation';
    }

    public function getList()
    {
        return $this->model->root()->descendants()->get()->pluck('name','id');
    }
}