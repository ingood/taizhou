<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository as Project;
use App\Repositories\OptionsRepository as Option;
class ProjectController extends Controller
{
    private $project;
    private $option;

    /**
     * ProjectController constructor.
     * @param $project
     * @param $option
     */
    public function __construct(Project $project, Option $option)
    {
        $this->project = $project;
        $this->option = $option;
    }

    public function index()
    {
        $projects = $this->project->getPaginatedList();
        return view('projects.index')->with(compact('projects'));
    }

    public function create()
    {
        $options = $this->option->getAllByCategories(['rwly', 'ssgmjjhy']);
        return view('projects.create')->with(compact('options'));
    }

    public function store(ProjectRequest $request)
    {
        $this->project->createRich($request->all());
//        return redirect(route('projects.index'));
    }

    public function show($id)
    {
        $project = $this->project->find($id);
        $options = $this->option->getNamesByCategories($project, ['rwly', 'ssgmjjhy']);
        return view('projects.show')->with(compact('project', 'options'));
    }

    public function edit($id)
    {
        $project = $this->project->find($id);
        $options = $this->option->getAllByCategories(['rwly', 'ssgmjjhy']);
        return view('projects.edit')->with(compact('project', 'options'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->project->updateRich($request->all(), $id);
        return redirect(route('projects.show', $id));
    }

    public function destroy($id)
    {
        $this->project->delete($id);
        return redirect(route('projects.index'));
    }
}
