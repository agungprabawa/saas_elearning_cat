<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups\GroupsModel;
use App\Models\Groups\GroupCategoriesModel;
use App\User;
use DB;

class GroupsController extends Controller
{
    public function groupIndex(){
        
        return view('pages.srv_admin.kelas.index');
    }

    public function groupCategoryIndex(){

    }

    public function storeGroup(Request $request){

    }

    public function storeGroupCategory(Request $request){

    }

    public function editGroup($id){
        return view('pages.srv_admin.kelas.manage');
    }

    public function editGroupCategory($id){

    }

    public function updateGroup(Request $request, $id){

    }

    public function updateGroupCategory(Request $request){

    }

    public function removeGroup(Request $request, $id){

    }

    public function removeGroupCategory(Request $request, $id){
        
    }

    public function groupsList(){
        $groups = GroupsModel::join('group_categories','id_g_category','=','group_category')
            ->leftJoin('group_users','groups.id_group','=','group_users.id_group')
            ->select(DB::raw('count(group_users.id_group) as users'),'groups.id_group as id_group','group_uuid','group_categories.label as category','groups.label as group_name','max_users')
            ->where('groups.company_id','=',auth()->user()->active_session)
            ->where('groups.is_deleted','=',0)
            ->groupBy('groups.id_group');
            
        return datatables()->of($groups)->toJson();
    }


//select count(group_users.id_group),`groups`.`id_group`, `group_uuid`, `group_categories`.`label` as `category`, `groups`.`label` as `group_name` from `groups` 
// inner join `group_categories` on `id_g_category` = `group_category` 
// left join group_users on group_users.id_group = groups.id_group
// where `groups`.`company_id` = 7 and `groups`.`is_deleted` = 0

//REVVV

// select count(group_users.id_group),`groups`.`id_group`, `group_uuid`, `group_categories`.`label` as `category`, `groups`.`label` as `group_name` from `groups` inner join `group_categories` on `id_g_category` = `group_category` left join group_users on groups.id_group = group_users.id_group where `groups`.`company_id` = 7 and `groups`.`is_deleted` = 0 GROUP BY groups.id_group

}
