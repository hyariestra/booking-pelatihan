<div class="w3-agile-footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Address</h4>
					</div>
					<div class="footer-grid-info">
						<p>Eiusmod Tempor inc
							<span>St Dolore Place,Kingsport 56777.</span>
						</p>
						<p class="phone">Phone : +1 123 456 789
							<span>Email : <a href="mailto:example@email.com">mail@example.com</a></span>
						</p>
					</div>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Navigation</h4>
					</div>
					<div class="footer-grid-info">
						<ul>
							<li><a href="about.html">About</a></li>
							<li><a href="gallery.html">Gallery</a></li>
							<li><a href="icons.html">Icons</a></li>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Latest Posts</h4>
					</div>
					<div class="w3agile_footer_grid_list">
						<ul>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Vestibulum ante ipsum</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Phasellus at eros</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Mauris eleifend aliquet</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Aliquam vitae tristique</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Pellentesque lobortis</li>
							<li><i class="fa fa-angle-right" aria-hidden="true"></i> Class aptent taciti</li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Twitter Posts</h4>
					</div>
					<div class="w3agile_footer_grid_list w3agile-post">
						<div class="fb-page" data-href="https://www.facebook.com/bumdes.id/" data-tabs="timeline" data-width="255" data-height="237" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bumdes.id/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bumdes.id/">bumdes.id</a></blockquote></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileits-w3layouts-copyright">
				<p>© 2017 Mug house . All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a> </p>
			</div>
		</div>
	</div>
		<!-- sponsors -->
		<!-- <div class="w3l-about sponsors jarallax">
			<div class="some-happy-clients">
				<div class="some-happy-clients-list">
					<h3 class="w3l-titles">Our Sponsors</h3>
					<div class="clients">
						<ul id="flexiselDemo3">
							<li>
								<a href="index.html">
									<div class="w3l-sponsers">
										<img src="images/s1.png" alt=" ">
									</div>
									<div class="w3l-sponsers-2">
										<h4>Biton</h4>
										<p>Lorem Ipsum sores</p>
									</div>
								</a>
							</li>
							<li>
								<a href="index.html">
									<div class="w3l-sponsers">
										<img src="images/s2.jpg" alt=" ">
									</div>
									<div class="w3l-sponsers-2">
										<h4>Oenopion</h4>
										<p>Lorem Ipsum sores</p>
									</div>
								</a>
							</li>
							<li>
								<a href="index.html">
									<div class="w3l-sponsers">
										<img src="images/s3.jpg" alt=" ">
									</div>
									<div class="w3l-sponsers-2">
										<h4>Aristns</h4>
										<p>Lorem Ipsum sores</p>
									</div>
								</a>
							</li>
							<li>
								<a href="index.html">
									<div class="w3l-sponsers">
										<img src="images/s4.jpg" alt=" ">
									</div>
									<div class="w3l-sponsers-2">
										<h4>Glykon</h4>
										<p>Lorem Ipsum sores</p>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div> -->
		<!-- //sponsors -->
		<!-- //footer -->

		<!-- js-scripts -->
		<!-- js -->

		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/SmartWizard-master/dist/js/jquery.smartWizard.min.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/bootstrap.js")?>"></script>
		<!-- Necessary-JavaScript-File-For-Bootstrap -->
		<!-- //js -->
		<!-- start-smoth-scrolling -->
		<script src="<?php echo base_url("theme/js/slick-master/slick/slick.js")?>" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/move-top.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/easing.js")?>"></script>
		<!-- datetimepicker js -->
		<script type="text/javascript" src="<?php echo base_url("theme/js/bootstrap-daterangepicker-master/moment.js")?>"></script>
      	<script type="text/javascript" src="<?php echo base_url("theme/js/bootstrap-daterangepicker-master/daterangepicker.js")?>"></script>

      	<!-- sticky sidebar -->

      	
      	<script type="text/javascript" src="<?php echo base_url("theme/js/sticky-sidebar-master/dist/sticky-sidebar.js")?>"></script>

		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$(".scroll").click(function (event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});

			$("input[name='optradio2']").click(function () {
				$('#show-me').css('display', ($(this).val() === '1' )||($(this).val() === '3' )  ? 'block':'none');
			});


		</script>
		<!-- start-smoth-scrolling -->
		<!--search jQuery-->
		<script src="<?php echo base_url("theme/js/main.js")?>"></script>
		<!--//search jQuery-->
		<!-- tabs -->
		<script src="<?php echo base_url("theme/js/easy-responsive-tabs.js")?>"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
				type: 'dots', //Types: dots, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});


			function pilihins(obj)
			{
				var nilai = $(obj).val();
				var target = "<?php echo base_url("Pendaftar/changepaketins") ?>";
				var data = {
					id : nilai
				}

				$.post(target, data, function(e)
				{
					var json = $.parseJSON(e);
					console.log(json);

					changeINS(json);
				});
			}


    function changeINS(json) 
    {
    	var table = document.getElementById("tableins");
		
		table.innerHTML = '';
		
		
			for(i = 0; i < json.ins.length; i++)
			{
				var row = table.insertRow();
				
				
				var nama = json.ins[i].nama_instansi;
				var alias = json.ins[i].nama_alias;
				var harga = json.ins[i].harga_ins;
				
				
				var Col0 = row.insertCell(0);
				var Col1 	= row.insertCell(1);
				var Col2	 = row.insertCell(2);
			
				
				
				Col0.innerHTML = nama;
				Col1.innerHTML =  alias;
				Col2.innerHTML = harga;
				
			
			}
		
    }




		</script>
		<!-- //tabs -->
		<!-- stats -->
		<script src="<?php echo base_url("theme/js/waypoints.min.js"); ?>"></script>
		<script src="<?php echo base_url("theme/js/counterup.min.js"); ?>"></script>
		<script>
			jQuery(document).ready(function ($) {
				$('.counter').counterUp({
					delay: 100,
					time: 1000
				});

				  $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
			});
		</script>
		<!-- stats -->
		<!-- flexisel -->
		<script type="text/javascript">
			$(window).load(function () {
				$("#flexiselDemo3").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: false,
					autoPlaySpeed: 3000,
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: {
						portrait: {
							changePoint: 480,
							visibleItems: 1
						},
						landscape: {
							changePoint: 640,
							visibleItems: 2
						},
						tablet: {
							changePoint: 768,
							visibleItems: 3
						}
					}
				});
			});
		</script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/jquery.flexisel.js")?>"></script>
		<!-- flexisel -->
		<!-- smooth scrolling -->
		<script src="<?php echo base_url("theme/js/SmoothScroll.min.js")?>"></script>
		<!-- //smooth scrolling -->
		<!-- text-effect -->
		<script type="text/javascript" src="<?php echo base_url("theme/js/jquery.transit.js")?>"></script>
		<script type="text/javascript" src="<?php echo base_url("theme/js/jquery.textFx.js")?>"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.test').textFx({
					type: 'fadeIn',
					iChar: 100,
					iAnim: 1000
				});
			});
			 $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
      });
      $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
      });
      $(".vertical-center").slick({
        dots: true,
        vertical: true,
        centerMode: true,
      });
      $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
		</script>
		<!-- //text-effect -->
		<!-- js-scripts -->

		<script type="text/javascript">
			$(document).ready(function(){
				
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-info')
            .on('click', function(){ 
            	if( !$(this).hasClass('disabled')){ 
            		var elmForm = $("#myForm");
            		if(elmForm){
            			elmForm.validator('validate'); 
            			var elmErr = elmForm.find('.has-error');
            			if(elmErr && elmErr.length > 0){
            				alert('Oops we still have error in the form');
            				return false;    
            			}else{
            				alert('Great! we are ready to submit form');
            				elmForm.submit();
            				return false;
            			}
            		}
            	}
            });
            var btnCancel = $('<button></button>').text('Cancel')
            .addClass('btn btn-danger')
            .on('click', function(){ 
            	$('#smartwizard').smartWizard("reset"); 
            	$('#myForm').find("input, textarea").val(""); 
            });                         
            
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
            	selected: 0, 
            	theme: 'arrows',
            	transitionEffect:'fade',
            	toolbarSettings: {toolbarPosition: 'bottom',
            	toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                        });
            
            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            	var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation 
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                	elmForm.validator('validate'); 
                	var elmErr = elmForm.children('.has-error');
                	if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;    
                    }
                }
                return true;
            });
            
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){ 
                	$('.btn-finish').removeClass('disabled');  
                }else{
                	$('.btn-finish').addClass('disabled');
                }
            });                               
            
        });   
    </script>

    <script type="text/javascript">
    	$(function() {
    		$('input[name="daterange"]').daterangepicker({
    			timePicker: false,
    			timePickerIncrement: 3,
    			locale: {
    				format: 'DD/MM/YYYY'
    			}
    		});
    	});
    </script>

    <script type="text/javascript">

    	function simpandata()
    	{
    		target = "<?php echo base_url('Pendaftar/simpanpendaftaran') ?>";
    		data = $('#myForm').serialize();

    		if ($("#namakelompok").val()=='') 
    		{
    			alert('Nama Kelompok Kosong');
    			return false;
    		}
    		$.post(target,data,function(e)
    		{
    			var js = $.parseJSON(e);
    			if (js.flag) {
    				alert('Data Berhasil di Update');
    			}else{
    				alert('gagal :( ');
    			}
    			
    		});
  
    	}
    </script>

    

 
    <!-- <script type="text/javascript">

		var a = new StickySidebar('#sidebar', {
			topSpacing: 20,
			bottomSpacing: 30,
			containerSelector: '.container',
			innerWrapperSelector: '.sidebar__inner'
		});
	</script> -->

	</body>

	</html>