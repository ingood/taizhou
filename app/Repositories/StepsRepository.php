<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class StepsRepository extends Repository
{
    public function model()
    {
        return 'App\Step';
    }

    public function getView()
    {

    }

    public function getNextRoute($projectId, $id)
    {
        $step = $this->model->where('id', '>', $id)->first();
        return route($step->route,['project' => $projectId, 'step' => $step->id]);
    }

    public function getRoute($step)
    {

    }
}