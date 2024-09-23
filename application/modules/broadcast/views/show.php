<?php
   $img      = $this->m_reff->post("img");
   $imgfull  = $this->m_reff->post("fullimg");
   $for  = explode(",",$imgfull);
   $position = array_search($img, $for)+1;
?>


<style>
	img {
		width: 100%;
	}
	.height {
		height: 10px;
	}
		
	/* Image-container design */
	.image-container {
		max-width: 800px;
		position: relative;
		margin: auto;
	}
		
	.next {
		right: 0;
	}
		
	/* Next and previous icon design */
	.previous,
	.next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		padding: 10px;
		margin-top: -25px;
	}
		
	/* caption decorate */
	.captionText {
		color: #000000;
		font-size: 14px;
		position: absolute;
		padding: 12px 12px;
		bottom: 8px;
		width: 100%;
		text-align: center;
	}
		
	/* Slider image number */
	.slideNumber {
		background-color: #5574C5;
		color: white;
		border-radius: 25px;
		right: 0;
		opacity: .5;
		margin: 5px;
		width: 30px;
		height: 30px;
		text-align: center;
		font-weight: bold;
		font-size: 24px;
		position: absolute;
	}
	.fa {
		font-size: 32px;
	}
		
	.fa:hover {
		transform: rotate(360deg);
		transition: 1s;
		color: white;
	}
		
	.footerdot {
		cursor: pointer;
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbbbbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.5s ease;
	}
		
	 .actives,
	.footerdot:hover {
		background-color: black;
	}
		
</style>




 
</head>

<body>
	<!-- <center> -->
		<!-- <h1 style="color:green">
			GeeksforGeeks
		</h1>
		
		<b>
			How to code Image
			Slider using jQuery
		</b> -->
		
		<!-- <br><br> -->
	<!-- </center> -->
    <!-- <div class="slideNumber">'.$i++.'</div> untuk penomoran setiap slide -->
	<!-- Image container of the image slider -->
	<div class="image-container">
        <?php
         
        $i=1;
        foreach($for as $val){
            $jenis = strpos($val,"mp4");
            if($jenis===false){

            echo '<div class="slide slide'.$i.'">
			<img src= "'.$val.'"><br><br>
           <center> <button onclick="del(`'.$val.'`,`'.$i.'`)" class="btn btn-sm btn-danger">Hapus</button>
                 </center>   </div>';

            }else{

                echo '<div class="slide slide'.$i.'">
                <video width="100%" height="240" controls>
                <source src="'.$val.'" type="video/mp4">
                Your browser does not support the video tag.
              </video>
                <br><br>
               <center> <button onclick="del(`'.$val.'`,`'.$i.'`)" class="btn btn-sm btn-danger">Hapus</button>
                     </center>   </div>';

            }
                 $i++;
        }
        ?>
		
 

		<!-- Next and Previous icon to change images -->
		<a class="previous" onclick="moveSlides(-1)">
			<i class="fa fa-chevron-circle-left"></i>
		</a>
		<a class="next" onclick="moveSlides(1)">
			<i class="fa fa-chevron-circle-right"></i>
		</a>
	</div>
	<br>

	<div style="text-align:center">
    <?php 
        $i=1;
        foreach($for as $val){
            echo '<span class="footerdot footerdot'.$i.'"
		        	onclick="activeSlide('.$i.')">
		          </span>';
                  $i++;
        }?>
		
		 
	</div>
	
	<script>
		var slideIndex = <?=$position;?>;
		displaySlide(slideIndex);

		function moveSlides(n) {
			displaySlide(slideIndex += n);
		}

		function activeSlide(n) {
			displaySlide(slideIndex = n);
		}

		/* Main function */
		function displaySlide(n) {
			var i;
			var totalslides =
				document.getElementsByClassName("slide");
			
			var totaldots =
				document.getElementsByClassName("footerdot");
			
			if (n > totalslides.length) {
				slideIndex = 1;
			}
			if (n < 1) {
				slideIndex = totalslides.length;
			}
			for (i = 0; i < totalslides.length; i++) {
				totalslides[i].style.display = "none";
			}
			for (i = 0; i < totaldots.length; i++) {
				totaldots[i].className =
				totaldots[i].className.replace(" actives", "");
			}
			totalslides[slideIndex - 1].style.display = "block";
			totaldots[slideIndex - 1].className += " actives";
		}
	</script>
</body>
<script>
    function del(img,urut){
        $(".slide"+urut).html('');
        $(".footerdot"+urut).hide();
        moveSlides(1);
        $.ajax({
                url: '<?= base_url() ?>broadcast/delimage',
                type: 'POST',
                dataType: 'json',
                data: {
                  img:img,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(val) {
                  token = val['token'];
                  loadUpload();
                }
            });
    }
</script>
</html>

















<!-- <img src='<?=$img?>'> -->