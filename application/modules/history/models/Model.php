<?php
class Model extends CI_Model
{

    
	public function __construct() {
        parent::__construct();
    }
	
	
       function getLastOrder(){
         $this->db->where("id_session_order",$this->input->get("last"));
        return $this->db->get("tm_list_order")->result();
    }
    
    function getHistory(){
        $this->db->where("id_user",$this->session->userdata("sender_number"));
        $this->db->where("hp_pelanggan",$this->session->userdata("hp"));
         $this->db->where("sts",1);
         $this->db->order_by("id","desc");
        $this->db->limit(20);
        return $this->db->get("tm_order")->result();
    }
    function update_qty(){
          $id    =   $this->input->post("id");
        $qty    =   $this->input->post("qty");
        if($qty==0){
             $this->db->where("id",$id);
        return $this->db->delete("tm_list_order");
        }
      
        $this->db->set("qty",$qty);
        $this->db->where("id",$id);
        return $this->db->update("tm_list_order");
    }
    function getListOrder($id){
        $this->db->where("id_session_order",$id);
        return $this->db->get("tm_list_order")->result();
    }
    
}
//End of file data_param.php