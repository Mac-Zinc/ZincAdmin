<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Template_Model extends Model
{
	public function insert($id)
    {
        $id = DB::table('incident_reports')->insertGetId(['reporter' => $id,'reporter_id' => $id]);
		return $id;
    }
	public function GenerateEditableListTemplate($id)
    {
       $data['table_title'] = 'Page List View';
		$value=array('mod_id','mod_name','mod_title','mod_des','mod_tip');
		$mod= DB::table('modules_mds')->select($value)->get(); 
		$data['table_head']= $value;
		$count_arr=count($value);
		
		$data['table_head'][$count_arr] = 'Edit';
		$data['table_head'][$count_arr+1] = 'Delete';
		
		
		foreach ($mod as $j=>$m)
		{
			 
			for($i=0;$i<($count_arr+2);$i++){
			
				if($data['table_head'][$i]!='Edit'&&$data['table_head'][$i]!='Delete')
				{
					
					$data['table_content'][$j][$i] = $m->{$value[$i]} ;
					$data['table_content_url'][$j][$i] = '';
				}
				else
				{
					if($data['table_head'][$i]=='Edit')
					{
						$data['table_content'][$j][$i] = $data['table_head'][$i];
						$data['table_content_url'][$j][$i] = '/edituser/'.$m->{$value[0]};
					}
					if($data['table_head'][$i]=='Delete')
					{
						$data['table_content'][$j][$i] = $data['table_head'][$i];
						$data['table_content_url'][$j][$i] = '/deleteuser/'.$m->{$value[0]};
					}
				}
			}
		}
		return $data;
    }
	public function getConfig($lvl)
    {
        $id = DB::table('incident_reports')->insertGetId(['reporter' => $id,'reporter_id' => $id]);
		return $id;
    }
	public function get_lvl($usr_lvl,$uid)	
    {
    		
			$values = array("id_ulv", "level_ulv",  "platform_access_app",  "platform_access_byod",  "allow_pin_login",  "restrict_to_single_login",  "password_expiry_policy", "password_expiry_policy_period",
            "time_out",  "time_out_period", "idle_time_out",  "idle_time_out_period","geo_location_tracking",  "geo_location_tracking_frequency",
            "restrict_to_defined_location",  "restrict_to_defined_location_area",  "login_audit_trail",  "display_order",  "restrict_to_single_device",  
            "restrict_accessto_location",  "restrict_accessto_region",  "restrict_accessto_zones",  "restrict_accessto_venues");
			
			$res=DB::table('userlevels_ulv')->where('id_ulv', $usr_lvl)->where('active_ulv',1)->select($values)->get(); 
			
			$user_info = Auth::user();
				
			foreach($res as $re)
			{
				$re->firstname_usr = 	$user_info->firstname_usr;
				$re->lastname_usr = 	$user_info->lastname_usr;
				$re->id_usr = 	$user_info->id_usr;
				$ret['user_config']=$re;
			}
			$res=DB::table('users_usr')->select('regions_usr as regions')->where('id_usr', $uid)->get(); 	
			foreach($res as $re)
			{
				$ret['regions_assigned']=explode(',', $re->regions);
			}
			$res=DB::table('users_usr')->select('zones_usr as zones')->where('id_usr', $uid)->get(); 	
			foreach($res as $re)
			{
				$ret['zones_assigned']=explode(',', $re->zones);
			}
			$res=DB::table('venue_users_vnu')->select('idvns_vnu as venue')->where('idusr_vnu', $uid)->get(); 	
			foreach($res as $re)
			{
				$ret['venues_assigned'][]= $re->venue;
			}
			
			$res = DB::table('app_access_restrictions_user')->select('mod_id' ,'access_restrictions')->where('user_id', $usr_lvl)->get(); 	
						
			foreach($res as $re)
			{
				$ret['app_access_restrictions_user'][$re->mod_id]= $re->access_restrictions;
			}
			
		return $ret;
    }
	
}