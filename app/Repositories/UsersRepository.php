<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class UsersRepository extends Repository
{
    public function model()
    {
        return 'App\User';
    }

    /**
     * 获取预加载单位和角色的用户分页列表
     * @return mixed
     */
    public function getPaginatedUsersWithCorporationAndRoles()
    {
        $users = $this->with(['corporation', 'roles'])->paginate();
        return $users;
    }
}