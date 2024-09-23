<style>
    .entry3 tr{
        border-bottom:green dashed 1px;
        font-weight:bold;
    }
    .entry3 tr td{
        padding-bottom:8px;
        padding-top:8px;
        color:black;
    }
</style>
<?php
 $img =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->session->userdata("foto1");
?>
 
<div data-card-height="90" class="card card-style bg-27 mb-0 rounded-s" style="height: 90px;">
                    <div class="card-center">
                    
                            <h4 class="text-center color-white text-uppercase">History Orders</h4>
                          
                   
                    </div>
                    <div class="card-overlay rounded-s bg-black opacity-70"></div>
                </div>
       <br/>
       <?php
   if($this->input->get("last")){
       echo $this->load->view("last");
   }
   ?>
   
<div class="card card-style bg-theme pb-0">
<div class="content">
   
   
   
   <table class="entry3" width="100%">
       <?php
       $data = $this->mdl->getHistory(); $no=1;
       foreach($data as $val){
           echo '<tr>
           <td>'.$no++.'.</td>
           <td>'.$this->tanggal->hariLengkap(substr($val->entry,0,10),"/").'</td>
           <td class="text-success">Rp '.number_format($val->harga_final,0,",",".").'</td> 
           <td><button style="max-width:80px" onclick="openDetail(`'.$val->id_order.'`)"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-mint-dark text-uppercase font-900 shadow-s bg-mint-dark"> Open</button></td>
       </tr>';
       }
       ?>
   </table>
 
 
 
 
</div>
</div>
 
 
<script>
	var token;
function loading(){
	return '<br/><div class="d-flex justify-content-center"><div class="spinner-border color-blue2-dark" style="border-width: 7px;" role="status"><span class="sr-only">.</span></div> &nbsp;&nbsp;Mohon tunggu ...</div>';
	}
	
function openDetail(id){
    $('#menu-confirm').showMenu();
    // $("#openDetail").html(loading());
    	$.ajax({
		 url:"<?=base_url()?>history/open",
		 method:"POST",
		 data:"id="+id,
		 dataType:"JSON",
    		 success: function(data)
      		{	
            $("#openDetail").html(data["data"]);
    		}     
        });
}
 
 
    function show(){
         $("#menu-order").addClass("menu-active");
    }
    function checkout(){
        $('#menu-confirm').showMenu();
    }
</script>
</div>

<!--<div id="menu-order" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="300" data-menu-effect="menu-over" style="display: block; height: 230px;">-->
<!--        <h3 class="text-center font-500   text-black pt-2"><i class="fa fa-shopping-cart"></i> Pesanan kamu</h3>-->
<!--       <div id="order"></div> -->
<!--        <div class="row me-3 ms-3 mt-3">-->
<!--            <div class="col-6">-->
<!--                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red-dark">tutup</a>-->
<!--            </div>-->
<!--            <div class="col-6">-->
<!--                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-green2-dark">checkout</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    
    
    
    <div id="menu-confirm" class="menu menu-box-modal rounded-m" data-menu-height="400" data-menu-width="320" style="display: block; width: 320px; height: 400px;">
        <div id="openDetail">
        </div>
        
             <center>
                <a href="javascript:selesai()" class="btn close-menu btn-sm   button-s shadow-l rounded-s text-uppercase font-900 bg-red2-dark">close</a>
            </center>
            <br>
         
    </div>