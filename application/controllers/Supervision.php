<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supervision extends MY_Controller {

	public function index() {
		if($this->current_user->role_id != 3 && $this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		$this->load->view('template', $this->data);
	}

	public function view(){
		if($this->current_user->role_id != 3 && $this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		$this->load->model(array('Users_m','Favoris_m','Rappels_m','Subscribers_m','Visits_m','Exports_m'));

		$user_id = $this->input->get('id');
		
		$this->data['user'] = $this->Users_m->get($user_id); 
		$this->data['favoris_infos'] = $this->Favoris_m->getSupervisionInfos($user_id);
		$this->data['rappels_infos'] = $this->Rappels_m->getSupervisionInfos($user_id);
		$this->data['subscribes'] = $this->Subscribers_m->getSupervisionInfos($user_id);
		$this->data['visits_infos'] = $this->Visits_m->getSupervisionInfos($user_id);
		$this->data['export_infos'] = $this->Exports_m->getSupervisionInfos($user_id);

		if(count($this->data['subscribes']) >0) $this->data['subscribers_infos'] = '<i class="fa fa-check green"></i>';
		else $this->data['subscribers_infos'] = '<i class="fa fa-remove red"></i>';


		$this->load->view('template', $this->data);
	}

	public function getAllConnectionDataTable(){
		$this->load->model(array('Connections_m'));

		$return = $this->input->get();
		$search = $this->input->get('search');
		if(isset($search['value'])){
			$search = $search['value'];
		}else{
			$search = false;
		}
		
		if($this->input->get('user_id' )){
			$user_id = $this->input->get('user_id');
		}else{
			$user_id = false;
		}

		if($this->input->get('agence_id' )){
			$agence_id = $this->input->get('agence_id');
		}else{
			$agence_id = false;
		}

		$start = 0;
		$length = 0;

		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		$order = false;
		if($this->input->get('order')){
			$order = array('column','dir');
			$order_value = $this->input->get('order');
			$order['dir'] = $order_value[0]['dir'];
			switch($order_value[0]['column']){
				case 0:
					$order['column'] = 'users.name';
					break;
				case 1:
					$order['column'] = 'connections.timestamp';
					break;
				default:
					break;
			}
		}

		/*if($this->current_user->role_id == 4){
			$agence_id = false;
		}else{
			$agence_id = $this->current_user->agence_id;
		}*/

		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"agence_id" => $agence_id,
			"user_id" => $user_id
		);


		$connexions = $this->Connections_m->getForAgenceSuperviser($params);

		$data = array();

		foreach($connexions as $key => $connexion){
			
			$data[] = array(
				$connexion->name." ".$connexion->firstname,
				date('d/m/Y H:i:s',$connexion->timestamp),
			);
		}
		$return["recordsTotal"] = count($connexions);
		$return["recordsFiltered"] = count($connexions);
		
		$return["data"] = $data;

		echo json_encode($return);


	}

	public function getAllDataTable(){
		$this->load->model(array('Users_m','Favoris_m','Rappels_m','Subscribers_m','Visits_m','Exports_m'));
		
		$return = $this->input->get();
		$search = $this->input->get('search');
		if(isset($search['value'])){
			$search = $search['value'];
		}else{
			$search = false;
		}

		$start = 0;
		$length = 0;

		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		$order = false;
		if($this->input->get('order')){
			$order = array('column','dir');
			$order_value = $this->input->get('order');
			$order['dir'] = $order_value[0]['dir'];
			switch($order_value[0]['column']){
				case 0:
					$order['column'] = 'users.name';
					break;
				default:
					$order['column'] = 'users.name';
					break;
			}
		}

		
		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"agence_id" => $this->current_user->agence_id
		);

		
		$users = $this->Users_m->getForAgenceSuperviser($params);
	//	echo $this->db->last_query();
		$data = array();

		foreach($users as $key => $user){
			$favoris_infos = $this->Favoris_m->getSupervisionInfos($user->id);
			$rappels_infos = $this->Rappels_m->getSupervisionInfos($user->id);
			$subscribes = $this->Subscribers_m->getSupervisionInfos($user->id);
			$visits_infos = $this->Visits_m->getSupervisionInfos($user->id);
			$export_infos = $this->Exports_m->getSupervisionInfos($user->id);

			if(count($subscribes) >0) $subscribers_infos = '<i class="fa fa-check green"></i>';
			else $subscribers_infos = '<i class="fa fa-remove red"></i>';

			if($favoris_infos['since_always']['last_favoris']){
				$last_favoris_date = date('d/m/Y H:i:s',$favoris_infos['since_always']['last_favoris']->created );
			}else{
				$last_favoris_date = '';
			}

			if($export_infos['since_always']['last_export']){
				$last_export_date = date('d/m/Y H:i:s',$export_infos['since_always']['last_export']->created);
			}else{
				$last_export_date = ''; 
			}

			if($rappels_infos['since_always']['last_rappels']){
				$last_rappel_date = date('d/m/Y H:i:s',$rappels_infos['since_always']['last_rappels']);
			}else{
				$last_rappel_date = ''; 
			}

			if($user->last_connection){
				$last_connection = date('d/m/Y H:i:s',$user->last_connection);
			}else{
				$last_connection = '';
			}
			
			$data[] = array(
				$user->name." ".$user->firstname,
				
				$last_connection,
				$last_favoris_date,
				$last_rappel_date,
				$last_export_date,
				

				'<ul class="list-tables-buttons" data-annonce_id="24">
                    <li class="table-btn-rappel"><a href="'.site_url('supervision/view').'/?id='.$user->id.'" ><i class="fa fa-binoculars"></i><span>See More</span></a></li>
                </ul>'
			);
		}
		$return["recordsTotal"] = count($users);
		$return["recordsFiltered"] = count($users);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	
	}
	

}

