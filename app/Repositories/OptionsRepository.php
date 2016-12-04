<?php
/**
 * author: seekerliu
 * createTime: 2016/12/2 下午1:41
 * Description:
 */

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class OptionsRepository extends Repository
{
    public function model()
    {
        return 'App\Option';
    }

    public function getAllByCategories($categories)
    {
        $options = [];
        if(is_array($categories)) {
            foreach($categories as $category) {
                $options[$category] = $this->getAllByCategory($category);
            }
        } else {
            $options[$categories] = $this->getAllByCategory($categories);
        }
        return $options;
    }

    public function getAllByCategory($category)
    {
        return $this->findAllBy('category', $category)->pluck('name', 'id')->toArray();
    }

    public function getNamesByCategories($project, $categories)
    {
        $names = [];
        foreach($categories as $category) {
            $names[$category] = $this->getByIds($project->$category);
        }

        return $names;
    }

    public function getByIds($ids)
    {
        return $this->model->whereIn('id', $ids)->get()->pluck('name')->toArray();
    }

}