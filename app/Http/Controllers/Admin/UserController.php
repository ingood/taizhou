<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository as User;
use App\Repositories\CorporationsRepository as Corporation;
use App\Repositories\RolesRepository as Role;
class UserController extends Controller
{
    private $user;
    private $corporation;
    private $role;

    /**
     * UserController constructor.
     * @param $user
     * @param $corporation
     * @param $role
     */
    public function __construct(User $user, Corporation $corporation, Role $role)
    {
        $this->user = $user;
        $this->corporation = $corporation;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->getPaginatedUsersWithCorporationAndRoles();
        return view('admin.users.index')->with(compact('users'));
    }

    public function create()
    {
        $corporations = $this->corporation->getList();
        $roles = $this->role->getList();
        return view('admin.users.create')->with(compact('corporations', 'roles'));
    }

    public function store(UserRequest $request)
    {
        $user = $this->user->create($request->all());
        $user->syncRoles([$request->input('role_id')]);
        return redirect(route('users.index'));
    }

    public function edit(Request $request, $id)
    {
        $user = $this->user->find($id);
        $corporations = $this->corporation->getList();
        $roles = $this->role->getList();
        \Session::put('listPage', $request->input('listPage'));
        return view('admin.users.edit')->with(compact('user', 'corporations', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'min:6|confirmed',
            'role_id' => 'required',
        ]);
        $user = $this->user->find($id);
        $this->user->updateRich($request->all(),$id);
        $user->syncRoles([$request->input('role_id')]);

        return redirect(route('users.index').'?page='.\Session::get('listPage'));
    }

    public function destroy($id)
    {
        $this->user->delete($id);
        return redirect()->back();
    }
}
