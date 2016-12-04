<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class RolesRepository extends Repository
{
    public function model()
    {
        return 'App\Role';
    }

    public function getList()
    {
        //[1 => '管理员']
        $roles = $this->model->orderBy('level')->get()->pluck('name','id');
        return $roles;
    }
}