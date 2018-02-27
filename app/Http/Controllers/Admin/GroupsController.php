<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/02/2018
 * Time: 12:28
 */

namespace App\Http\Controllers\Admin;


use App\Group_Members;
use App\Groups;
use App\Http\Controllers\AdminController;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupsController extends AdminController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function groups()
    {
        $groups = Groups::paginate(10);
        return view('admin.groups', ['groups' => $groups]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $group = Groups::find($request['id']);
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'group_name' => 'required|max:64'
            ]);

            if ($validator->fails()) {
                return redirect(url()->current())
                    ->withInput()
                    ->withErrors($validator);
            }

            $group->group_name = $request['group_name'];
            $group->group_description = $request['group_description'];

            $group->save();

            return redirect(Route('adminGroupsView', $group->id));
        }
        return view('admin.groups.edit', ['group' => $group]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function delete(Request $request)
    {
        if(!($group = Groups::find($request['id'])))
            return redirect(Route('adminGroupsList'))->withErrors('Group does not exist');

        if($request->isMethod('post'))
        {
            if(isset($request['cancel'])) return redirect(Route('adminGroupsView', $request['id']));
            if(isset($request['delete'])) {
                //TODO: run destroy script here. must do members too
                Group_Members::where('group_id', $request['id'])->delete();
                Groups::destroy($request['id']);
                return redirect(Route('adminGroupsList'));
            }
        }
        return view('admin.groups.delete', ['group' => $group]);
    }

    public function removemember(Request $request)
    {
        if($request->isMethod('post'))
        {
            if(isset($request['empty']))
                Group_Members::where('group_id', $request['id'])->delete();

            if(isset($request['member'])){
                Group_Members::where('group_id', $request['id'])->whereIn('id', $request['member'])->delete();
            }
        }
        return redirect()->route('adminGroupsView', $request['id']);
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function group(Request $request)
    {
        try
        {
            $groups = Groups::findOrFail($request['id']);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect()
                ->to(Route('adminGroupsList'))
                ->withErrors('Group does not exist')
                ->send();
        }
        return view('admin.groups.group', ['group' => $groups]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addmember(Request $request)
    {
        if ($request->isMethod('post')) {
            if (count($request['user']) > 0) {
                $group = Groups::find($request['id']);
                foreach ($request['user'] as $member) {
                    $array = $group->members->pluck('member_id')->toArray();
                    if(!in_array($member, $array)){
                        $group_member = new Group_Members;
                        $group_member->group_id = $request['id'];
                        $group_member->member_id = $member;
                        $group_member->save();
                    }
                }
            }

        }
        $groups = Groups::find($request['id']);
        return view('admin.groups.add_member', ['group' => $groups, 'users' => User::whereNotIn('id', $groups->members->pluck('member_id'))->get()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'group_name' => 'required|max:64'
            ]);

            if ($validator->fails()) {
                return redirect(url()->current())
                    ->withInput()
                    ->withErrors($validator);
            }

            $group = new Groups;
            $group->group_name = $request['group_name'];
            $group->group_description = $request['group_description'];

            $group->save();

            return redirect(Route('adminGroupsView', $group->id));
        }
        return view('admin.groups.add');
    }
}