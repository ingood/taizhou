<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class ProjectsRepository extends Repository
{
    public function model()
    {
        return 'App\Project';
    }

    /**
     * 获取预加载单分页列表
     * @return mixed
     */
    public function getPaginatedList()
    {
        $projects = $this->paginate();
        return $projects;
    }

    public function createRich($data)
    {
        $data['user_id'] = \Auth::user()->id;
        $this->model->create($data);
    }
}