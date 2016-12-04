<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRequest;
use Illuminate\Http\Request;
use App\Repositories\AwardsRepository as Award;
class AwardController extends Controller
{
    private $award;

    /**
     * AwardController constructor.
     * @param $award
     */
    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    public function store(AwardRequest $request)
    {
        $award = $this->award->create($request->all());
        return redirect(route('projects.awards', $award->project_id));
    }

    public function edit($id)
    {
        $award = $this->award->find($id);
        return view('awards.edit')->with(compact('award'));
    }

    public function update(AwardRequest $request, $id)
    {
        $award = $this->award->find($id);
        $this->award->updateRich($request->all(), $award->id);
        return redirect(route('projects.awards', [$award->project_id]));
    }

    public function destroy($id)
    {
        $award = $this->award->find($id);
        $this->award->delete($id);
        return redirect(route('projects.awards', $award->project_id));
    }
}
