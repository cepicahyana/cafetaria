<div id="footer-bar" class="footer-bar-5">
 
<a href="javascript:reload(`<?php echo base_url()?>resto`)"><i class="fa fa-store font-16 color-blue2-dark"></i><span>Store</span></a>
<a href="javascript:reload(`<?php echo base_url()?>daftar_menu`)" class="active-navs"><i class="fas fa-utensils font-16 color-red2-dark"></i><span>Daftar menu</span></a>
<a href="javascript:reload(`<?php echo base_url()?>history`)"><i class="fa fa-calendar-check font-16 color-green2-dark"></i> <span>History</span></a>
<a href="javascript:reload(`<?php echo base_url()?>saran`)"><i class="fa fa-edit font-16 color-pink2-dark"></i> <span>Kritik & Saran</span></a>

</div>

<script>
function reload(url){
	window.location.href=url;
}
</script>