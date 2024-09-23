<div class="main-content horizontal-content" style="margin-top:80px;">
 <div class="container-fluid content">

<?php 
if(isset($konten)){?>	 
             <?php echo $this->load->view($konten);?>
<?php 	}else{	echo "File Konten Tidak Ada";}; ?>

</div>
</div>