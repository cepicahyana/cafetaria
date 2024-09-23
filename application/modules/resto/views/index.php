<div class="">
<div class="highlight-changer">
 
<a href="#" data-change-highlight="blue2"><i class="fa fa-circle color-blue2-dark"></i><span class="color-blue2-light">Default</span></a>
<a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span class="color-pink2-light">Pink</span></a>
<a href="#" data-change-highlight="magenta2"><i class="fa fa-circle color-magenta2-dark"></i><span class="color-magenta2-light">Purple</span></a>
<a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span class="color-mint-light">Mint</span></a>
<a href="#" data-change-highlight="green2"><i class="fa fa-circle color-green2-dark"></i><span class="color-green2-light">Green</span></a>

<div class="clearfix"></div>
</div>
</div>

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
 $f5 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto5;
  $f1 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto1;
   $f2 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto2;
    $f3 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto3;
     $f4 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto4;
?>
 
      
        <div class="card rounded-l mx-2 text-center shadow-l" data-card-height="520" style="height: 520px;background-image:url(<?=$f1;?>)">
                            <div class="card-bottom " >
                                <!--<h1 class="font-21 font-500"><?=$this->m_reff->nama_resto();?></h1>-->
                                <p class="boxed-text-xl">
                                 <a target="_blank" href="<?=$this->session->userdata("ig");?>">  <img width="20px" src="<?=base_url();?>plug/img/ig.png"><b> <?=$this->session->userdata("ig");?></b></a>
                                </p>
                                <div style="line-height:17px;padding:10px">
 <?php
  echo $this->m_reff->resto()->story;
  ?>
  <hr>
  <span class="text-success"> <?php
  echo $this->m_reff->resto()->info;
  ?></span>
  <hr>
    </div>
                            </div>
                            <div class="card-overlay bg-gradient-fade"></div>
        </div> 

<div class="card card-style pb-0" style="background-color:#F0F8FF">
    <div class="card-body">
  
  
  
  
  <div class="">

 
  <?php
 if($this->m_reff->resto()->foto2){?>
 <img src="<?=$f2?>" data-src="<?=$f2?>" class="rounded-m preload-img shadow-l img-fluid entered loaded" alt="img" data-ll-status="loaded"> <br><br>
 <?php } ?>
 
  <?php
 if($this->m_reff->resto()->foto3){?>
 <img src="<?=$f3?>" data-src="<?=$f3?>" class="rounded-m preload-img shadow-l img-fluid entered loaded" alt="img" data-ll-status="loaded"> <br><br>
 <?php } ?>
  
  <?php
 if($this->m_reff->resto()->foto4){?>
 <img src="<?=$f4?>" data-src="<?=$f4?>" class="rounded-m preload-img shadow-l img-fluid entered loaded" alt="img" data-ll-status="loaded"> <br><br>
 <?php } ?>
   
                        
                    
         
  
  
  
  
</div>
</div>








 