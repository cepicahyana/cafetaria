	<!--- JQuery min js --->
<input type="hidden" name="token_footer" id="token_footer" value="<?php echo $this->m_reff->getToken()?>">
<!--- Datepicker js --->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

    <!--- Bootstrap Bundle js --->
	<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!--- Ionicons js --->
	<script src="<?php echo base_url()?>assets/plugins/ionicons/ionicons.js"></script>

	<!--- Moment js --->
	<script src="<?php echo base_url()?>assets/plugins/moment/moment.js"></script>

	<!--- JQuery sparkline js --->
	<script src="<?php echo base_url()?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

	<!--- Perfect-scrollbar js --->
	<script src="<?php echo base_url()?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/perfect-scrollbar/p-scroll.js"></script>

	<!--- Internal lightslider js --->
	<script src="<?php echo base_url()?>assets/plugins/lightslider/js/lightslider.min.js"></script>

	<!--- Eva-icons js --->
	<script src="<?php echo base_url()?>assets/js/eva-icons.min.js"></script>

	<!--- Rating js --->
	<script src="<?php echo base_url()?>assets/plugins/rating/jquery.rating-stars.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/rating/jquery.barrating.js"></script>

	<!--- Custom Scroll bar Js --->
	<script src="<?php echo base_url()?>assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

	<!--- Horizontalmenu js --->
	<script src="<?php echo base_url()?>assets/plugins/horizontal-menu/horizontal-menu.js"></script>

	<!--- Right-sidebar js --->
	<script src="<?php echo base_url()?>assets/plugins/sidebar/sidebar.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/sidebar/sidebar-custom.js"></script>

	<!--- Internal Chat js --->
	<script src="<?php echo base_url()?>assets/js/chat.js"></script>

	<!--- Sticky js --->
	<script src="<?php echo base_url()?>assets/js/sticky.js"></script>

	<!--- script js --->
	<script src="<?php echo base_url()?>assets/js/script.js"></script>

	<!--- Custom js --->
	<script src="<?php echo base_url()?>assets/js/custom.js"></script>
	



<!--- Select2 js --->
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/sumoselect/jquery.sumoselect.js"></script>
 
    <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pages/ac-notification.js"></script>
 <script src="<?php echo base_url()?>assets/js/plugins/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pages/ac-alert.js"></script>  
  <script type="text/javascript"> 
   var token = $("#token_footer").val();
		  $(document).off("click",".menuclick").on("click",".menuclick",function (event, messages) {
			   event.preventDefault()
			   var url = $(this).attr("href");
			   var title = $(this).attr("title");
			   var session = "1";
			 
			     if(url=="<?php echo base_url()?>login/logout")
				 {
					 window.location.href="<?php echo base_url()?>login/logout";
				 } 
				   
				 $("a").removeClass('active');  
			    $(this).addClass('active');
			    
				$(".content").html('<center><div style="height:100%"> <button class="btn btn-dark" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading... </button></div></center>')
                
               

            $.ajax({
            type: "POST",
            dataType: "json",
            data: {ajax:"yes",<?php echo $this->m_reff->tokenName()?>:token},
            url: url,
            success: function(data){
                // $("#token_footer").val(data["token"]);
                token=data["token"];
                $('.modal.aside').remove();
                history.replaceState(title, title, url);
                $('title').html(title);
                $(".content").html(data["data"]);
                }
            });

		  })

          function swal_notif(msg){
            swal(msg, {
										  icon: "success",
										  buttons : {
											  confirm : {
												  className: 'btn btn-success'
											  }
										  }
									  });
          }
	 </script> 
 

</body>
</html>
	
		
	