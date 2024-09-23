<div id="order-home" class="add-to-home  add-to-home-android" onclick="scrollBottom()">
<h1 class="color-white mt-0 mb-2 font-15"><span style="color:yellow"><span id="home_item"></span>  Item</span>  - Total : <span id="home_total"></span> </h1>
<p>
Your shopping
</p>
<i class="fa fa-caret-up"></i>

<span class="fa fa-shopping-cart" style="font-size:25px;margin-left:20px;margin-top:20px;color:grey"></span>
<br>
<button class='float-right sadow btn btn-xxs rounded-xxs mb-1 border-mint-dark text-uppercase font-900   bg-mint-dark fa fa-shopping-cart' style='margin-right:10px'>  Lihat keranjang</button>
</div>

<style>
    .entry3 tr{
        border-bottom:green dashed 1px;
        font-weight:bold;
    }
    .entry3 tr td{
        padding-bottom:4px;
        padding-top:4px;
        color:black;
        font-size:13px;
    }
      .entry3 tr:last-child{
        border-bottom:green dashed 0px;
        font-weight:bold;
    }
</style>
<?php
 $img =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->session->userdata("foto1");
?>
 
        <div class="card rounded-l mx-2 text-center shadow-l" data-card-height="320" style="height: 320px;background-image:url(<?=$img;?>)">
                            <div class="card-bottom " >
                                <h1 class="font-21 font-500"><?=$this->m_reff->nama_resto();?></h1>
                                <p class="boxed-text-xl">
                                 <a target="_blank" href="<?=$this->session->userdata("ig");?>">  <img width="20px" src="<?=base_url();?>plug/img/ig.png"> <?=$this->session->userdata("ig");?></a>
                                </p>
                            </div>
                            <div class="card-overlay bg-gradient-fade"></div>
        </div>
<div class="card card-style bg-theme pb-0">
<div class="content">
<div class="tab-controls tabs-round tab-animated tabs-medium tabs-rounded shadow-xl" data-tab-items="3" data-tab-active="bg-blue2-dark color-white">
<a href="#" data-tab-active="" data-tab="tab-5" class="bg-blue2-dark color-white no-click" style="width: 33.3333%;"> <span class="fas fa-utensils color-red2-dark"></span>  Makanan</a>
<a href="#" data-tab="tab-6" style="width: 33.3333%;" class=""><span class="fa fa-coffee color-green2-dark"></span> Minuman</a>
<a href="#" data-tab="tab-7" style="width: 33.3333%;" class=""><span class="fa fa-heart color-pink2-dark select-all"></span> Specials</a>
</div>
<div class="clearfix mb-3"></div>
<div class="tab-content  no-repeat" id="tab-5" style="display: block;">
<p>

       <?php
       $kat = $this->mdl->getKategoryMenu(1);
       $noka = 1;
       foreach($kat as $v){
           $noka++;
           if($v->kategory){
               $ka = explode(".",$v->kategory,2);
               $k = isset($ka[1])?($ka[1]):null;
                if(!$k){
                    $k = $v->kategory; 
                }
           }else{
               $k= "Lainnya";
           }
           
//             echo '<div class="shadow-0 bg-highlight mb-0">
// <button class="btn accordion-btn border-0 color-white collapsed" data-toggle="collapse" data-target="#collapse-'.$noka.'" aria-expanded="false">
// <i class="fa fa-heart mr-2"></i>
// '.$k.'
// <i class="fa fa-plus font-10 accordion-icon"></i>
// </button>
// <div id="collapse-'.$noka.'" class="bg-theme collapse " data-parent="#accordion-2" style="">
// <div class="p-3 text-black">';

          echo "<div class='btn btn-full btn-border btn-s text-uppercase font-900 shadow-l  color-dark'>  ".$k."</div>";
               $data = $this->mdl->getMenu(1,$v->kategory); $no=1;
               echo '   <table class="entry3" width="100%">';
                   foreach($data as $val){
                       if($val->sts==1){
                           $sts='<button style="max-width:80px" onclick="setorder(`'.$val->id.'`)"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-mint-dark text-uppercase font-900 shadow-s bg-mint-dark fa fa-shopping-cart"> Order</button>';
                       }else{
                           $sts='<button style="max-width:80px"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-dark-dark text-uppercase font-900 shadow-s bg-dark-dark fa fa-shopping-cart"> Habis</button>';
                       }
                       
                       $nama = $val->nama; 
                       echo '<tr>
                       <td style="line-height:12px" >'.$nama.'</td>
                       <td class="text-success" style="padding-left:5px" >'.number_format($val->harga,0,",",".").'</td> 
                       <td style="width:90px">'.$sts.'</td>
                   </tr>';
              }
              
              echo ' </table>';
                // echo '</div></div></div>';
       }
   
       ?>
  
</p>
</div>
<div class="tab-content " id="tab-6" style="display: none;">
<div class="accordion mt-2" id="accordion-2">
  <?php
       $kat = $this->mdl->getKategoryMenu(2);
       foreach($kat as $v){
           if($v->kategory){
               $ka = explode(".",$v->kategory,2);
               $k = isset($ka[1])?($ka[1]):null;
                if(!$k){
                    $k = $v->kategory; 
                }
           }else{
               $k= "Lainnya";
           }
          

           echo "<div class='btn btn-full btn-border btn-s text-uppercase font-900 shadow-l  color-dark'>  ".$k."</div>";
               $data = $this->mdl->getMenu(2,$v->kategory); $no=1;
               echo '   <table class="entry3"   width="100%">';
                   foreach($data as $val){
                       if($val->sts==1){
                           $sts='<button style="max-width:80px" onclick="setorder(`'.$val->id.'`)"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-mint-dark text-uppercase font-900 shadow-s bg-mint-dark fa fa-shopping-cart"> Order</button>';
                       }else{
                           $sts='<button style="max-width:80px"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-dark-dark text-uppercase font-900 shadow-s bg-dark-dark fa fa-shopping-cart"> Habis</button>';
                       }
                       echo '<tr>
                      
                       <td style="mn-width:450px">'.$val->nama.'</td>
                        <td class="text-success" style="padding-left:5px" align="right">'.number_format($val->harga,0,",",".").'</td> 
                       <td style="width:90px">'.$sts.'</td>
                   </tr>';
              }
              
              echo ' </table>';
       
       }
   
       ?>
 
</div>
</div>
<div class="tab-content" id="tab-7" style="display: none;">
      <table class="entry3" width="100%"> 
<?php
       $data = $this->mdl->getSpecial(); $no=1;
       foreach($data as $val){
           echo '<tr>
          
           <td>'.$val->nama.'</td>
           <td class="text-success" style="padding-left:5px" align="right">'.number_format($val->harga,0,",",".").'</td> 
           <td><button style="width:90px"  onclick="setorder(`'.$val->id.'`)"  class="float-right sadow btn btn-xxs rounded-xxs mb-1 border-pink-dark text-uppercase font-900 shadow-s bg-pink-dark fa fa-shopping-cart"> Order</button></td>
       </tr>';
       }
       ?>
          </table>
</div>
</div>
</div>

<div class="card card-style pb-0" style="background-color:#F0F8FF">
    <div id="order2" ></div>
</div>





 
<script>
	var token;
function loading(){
	return '<br/><div class="d-flex justify-content-center"><div class="spinner-border color-blue2-dark" style="border-width: 7px;" role="status"><span class="sr-only">.</span></div> &nbsp;&nbsp;Mohon tunggu ...</div>';
	}
	
	
	var	token  = "";


//  setTimeout(function(){ 
//       $("#order-home").removeClass("add-to-home-visible");
//  }, 200);
function setorder(id)
{		 loading_block("order2");
		$.ajax({
		 url:"<?=base_url()?>daftar_menu/order",
		 data:"id="+id,
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {
    $("#order-home").removeClass("add-to-home-visible");
            },
    		 success: function(data)
      		{	
      	   
   
   if(data["item"]>0){
       setTimeout(function(){ 
        $("#order-home").addClass("add-to-home-visible");
   }, 400);
   }
      		    
    			 $("#order2").html(data["data"]);
    			 $("#home_total").html(data["total"]);
    			 $("#home_item").html(data["item"]);
    			 if(id){
    			 // window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
    			 }
    		}     
        });
}
function scrollBottom(){
       $("#order-home").removeClass("add-to-home-visible");
    window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
}
function updateQty(id,qty){
    	 loading_block("order2");
		$.ajax({
		 url:"<?=base_url()?>daftar_menu/update_qty",
		 data:"id="+id+"&qty="+qty,
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {
		            $("#order-home").removeClass("add-to-home-visible");
            },
    		 success: function(data)
      		{	
      		        if(data["item"]>0){
       setTimeout(function(){ 
        $("#order-home").addClass("add-to-home-visible");
   }, 400);
   }
    			 $("#order2").html(data["data"]);
 $("#home_total").html(data["total"]);
    			 $("#home_item").html(data["item"]);
    		}     
        });
}
function selesai(){
    var cat = $("#catatan").val();
     var no_meja = $("#no_meja").val();
     var nama = $("#nama_pemesan").val();
     if(!no_meja){
         document. getElementById("no_meja").focus();
           return false;
     }
      if(!nama){
         document. getElementById("nama_pemesan").focus();
           return false;
     }
     
    	$.ajax({
		 url:"<?=base_url()?>daftar_menu/selesai",
		 method:"POST",
		 data:"cat="+cat+"&no_meja="+no_meja+"&nama="+nama,
		 dataType:"JSON",
		    beforeSend: function() {
		       
            },
    		 success: function(data)
      		{	
window.location.href="/history?last="+data;
    		}     
        });
}

 
 
    function show(){
         $("#menu-order").addClass("menu-active");
    }
    	setTimeout(	setorder(null), 1000);
    function checkout(){
        
        //  $("#menu-confirm").addClass("modal-active");
        $('#menu-confirm').showMenu();
        	setTimeout(	 $("#menu-confirm").addClass("menu-active"), 1000);
        
    }
</script>

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
    <?php
    $nampang = $this->session->userdata("nama_pelanggan");
    if(!$nampang){
        $nampang =  $this->session->userdata('nama');
    }
    ?>
    
     </div>
    <div id="menu-confirm" class="menu menu-box-modal rounded-m" data-menu-height="350"   style="display: block; width: 90%; height: 350px;">
        <h1 class="text-center font-700 mt-3 ">Selesaikan order ?</h1>
       <div class="card-body" style="margin-top:-20px">
           No meja<br>
           <input type="text" id="no_meja" class="form-control">
           Pesanan atas nama<br>
            <input type="text" id="nama_pemesan"  class="form-control" value="<?=$nampang?>">
           Catatan pesanan jika ada<br>
                 <textarea id="catatan" style="width:100%;font-size:13px;color:black"  class="form-control" placeholder=""></textarea></div>
        <div class="row card-body" style="margin-top:-20px"> 
             <div class="col-6">
                <a href="#" class="close-menu btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-red-dark">Order lagi</a>
            </div>
            <div class="col-6">
                <a href="javascript:selesai()" class="btn btn-sm btn-full button-s shadow-l rounded-s text-uppercase font-900 bg-mint-dark">Checkout</a>
            </div>
            <br>
        </div>
    </div>
    
    
    
    
    
    
    