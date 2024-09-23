<?php
$level = $this->session->userdata("level");
if($level=="admin"){
    $this->load->view("temp_main/menu_admin");
}elseif($level=="member"){
    $this->load->view("temp_main/menu_member");
} 
?>

