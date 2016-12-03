<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository as Project;
use App\Repositories\OptionsRepository as Option;
use App\Repositories\StepsRepository as Step;
class ProjectController extends Controller
{
    private $project;
    private $option;
    private $step;

    /**
     * ProjectController constructor.
     * @param $project
     * @param $option
     */
    public function __construct(Project $project, Option $option, Step $step)
    {
        $this->project = $project;
        $this->option = $option;
        $this->step = $step;
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
        $project = $this->project->createRich($request->all());
        return redirect(route('projects.steps.edit', ['project' => $project->id, 'step'=>2]));
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
        return redirect(route('projects.steps.edit', ['project' => $id, 'step'=>2]));
//        return redirect(route('projects.show', $id));
    }

    public function destroy($id)
    {
        $this->project->delete($id);
        return redirect(route('projects.index'));
    }

    public function stepEdit($id, $stepId)
    {
        $project = $this->project->find($id);
        $step = $this->step->find($stepId);
        return view('projects.steps.'.$step->name)->with(compact('project','step'));
    }

    public function stepUpdate(Request $request, $id, $stepId)
    {
        $project = $this->project->find($id);
        $this->project->updateRich($request->all(),$project->id);
        $next = $this->step->getNextRoute($project->id, $stepId);
        return redirect($next);
    }
}
