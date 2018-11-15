        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">


		<div class="col-md-6">
			<form name="product_properties" id="product_properties" class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-12 control-label">6/12/2018</label>				
				</div>
				<div class="form-group" >					
					<label class="col-sm-6 control-label">Penimbang</label>				
					<label class="col-sm-6 control-label">Jenis</label>									
				</div>
				<div class="form-group" >					
					<div class="col-sm-6">
						<select class="select2 form-control input-sm" name="penimbang" id="penimbang">
							<optgroup label="Nama Penimbang">
								<option value=1>Kasir 1</option>
								<option value=2>Kasir 2</option>
								<option value=3>Kasir 3</option>
								<option value=4>Kasir 4</option>
							</optgroup>
						</select>
					</div>					
					<div class="col-md-6">
						<select class="form-control input-sm" name="product_category" id="product_category">
							<optgroup label="Jenis Barang">								
								<option value=KL>Kalung</option>
								<option value=LN>Liontin</option>
								<option value=GL>Gelang</option>
								<option value=CN>Cincin</option>
								<option value=AN>Anting</option>
								<option value=GW>Giwang</option>
							</optgroup>
						</select>
					</div>					
				</div>
				<div class="form-group" >					
					<label class="col-sm-6 control-label">Berat</label>				
					<label class="col-sm-6 control-label">Kode</label>									
				</div>
				<div class="form-group" >					
					<div class="col-md-6">
						<input id="berat" name="berat" class="form-control input-sm" placeholder="Berat"/>										
					</div>
					<div class="col-md-6">
						<select class="select2 form-control input-sm" name="product_class" id="product_class">
							<optgroup label="Keterangan">
								<option value=1>Emas Tua 700</option>
								<option value=2>Emas Tua 750</option>
								<option value=3>Emas Muda 300</option>
								<option value=4>Emas Muda 450</option>
								<option value=5>Emas Arab</option>
							</optgroup>
						</select>
					</div>										
				</div>
				<div class="form-group" >										
					<div class="col-md-6">

					</div>
					<div class="col-md-6">						
						<input id="is_secondhand" name="is_secondhand" type="checkbox" style="vertical-align: middle;" class=" input-sm" />&nbsp;<label for="barangbaru">Barang Baru</label>											
					</div>
				</div>
				<div class="form-group" >										
					<div class="col-md-6">
						<div class="canvas-container">
							<canvas id="canvas" class="canvas" name="product_image_blob"></canvas>
						</div>
					</div>										
					<div class="col-md-6">
						<div class="row">
							<input type="text" class="form-control" name="product_name" placeholder="Nama Barang" value="Nama Barang"/>	
						</div>
						<div class="row">
							<input type="text" class="form-control" id="generated_barcode" name="generated_barcode" placeholder="Generated Barcode" value=""/>	
						</div>
						<div class="row">
							<div class="barcode-container">
							<div id="barcode" class="barcode" style="padding:30px;padding-top:40px;margin-top:10px;border:1px red grey;background: white;">
								<?php
									$system_temp_array = explode('/', $_SERVER['PHP_SELF']);
									$system_temp_array2 = explode('.', $system_temp_array[count($system_temp_array) - 1]);
									$filename = $system_temp_array2[0];

									$filename="code128";

									$default_value = array();
									$default_value['output'] = 1;
									$default_value['dpi'] = 72;
									$default_value['thickness'] = 30;
									$default_value['res'] = 1 ;
									$default_value['rotation'] = 0.0;
									$default_value['font_family'] = 'Arial.ttf';
									$default_value['font_size'] = 8;
									$default_value['text2display'] = isset($_REQUEST['generated_barcode']) ? $_REQUEST['generated_barcode'] : '';
									$default_value['a1'] = '';
									$default_value['a2'] = '';
									$default_value['a3'] = '';

									$output = intval(isset($_POST['output']) ? $_POST['output'] : $default_value['output']);
									$dpi = isset($_POST['dpi']) ? $_POST['dpi'] : $default_value['dpi'];
									$thickness = intval(isset($_POST['thickness']) ? $_POST['thickness'] : $default_value['thickness']);
									$res = intval(isset($_POST['res']) ? $_POST['res'] : $default_value['res']);
									$rotation = isset($_POST['rotation']) ? $_POST['rotation'] : $default_value['rotation'];
									$font_family = isset($_POST['font_family']) ? $_POST['font_family'] : $default_value['font_family'];
									$font_size = intval(isset($_POST['font_size']) ? $_POST['font_size'] : $default_value['font_size']);
									$text2display = isset($_POST['text2display']) ? $_POST['text2display'] : $default_value['text2display'];
									$a1 = isset($_POST['a1']) ? $_POST['a1'] : $default_value['a1'];
									$a2 = isset($_POST['a2']) ? $_POST['a2'] : $default_value['a2'];
									$a3 = isset($_POST['a3']) ? $_POST['a3'] : $default_value['a3'];
									
										$theimage = '<img src="http://localhost:85/courses/derry/development/assets/library/barcodegen.1d-php5.v2.2.0/html/image.php?code=' . $filename . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';
									echo $theimage;
								
								?>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="form-group" >										
					<div class="col-md-6">
						
					</div>										
					<div class="col-md-6">
						<div class="btn-group btn">
							<button type="button" id="generate_barcode" name="generate_barcode">Generate <i class="fa fa-barcode"></i></button>
							<button type="submit" >Generate <i class="fa fa-barcode"></i> Image</button>
							<button type="button" id="save_product" name="save_product">Save <i class="fa fa-save"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h4 style="margin:0;padding:0;">Web Cam</h4>
			<button onclick="snap(event);">Snap <i class="fa fa-camera"></i></button>
			<div class="form-group" style="margin:0;padding:0;">										
				<div class="video-container" style="margin:0;">
					<video id="video" class="video"></video>	
				</div>								
			</div>
		</div>
	
    
 
    
	<script type="text/javascript">
		var video = document.getElementById('video');
		var canvas = document.getElementById('canvas');
		var context = canvas.getContext('2d');

		navigator.getUserMedia = navigator.getUserMedia ||  navigator.webkitGetUserMedia  || navigator.mozGetUserMedia ||  navigator.oGetUserMedia  || navigator.msGetUserMedia;
		
		if(navigator.getUserMedia){
			navigator.getUserMedia({video:true}, streamWebCam, throwError);
		}

		function streamWebCam(stream){
			video.src= window.URL.createObjectURL(stream);
			video.play();
		}

		function throwError(e){
			alert(e.name);
		}

		function snap(o){
			o.preventDefault();
			canvas.width = video.clientWidth;
			canvas.height = video.clientHeight;
			context.drawImage(video,0,0);
		}


	</script>
	<style>
	    .video-container {
	      position: relative;
	      overflow: hidden;
	      height: 0;
	      padding-top: 100%;
	      /*  padding-botte: ;om: 56.25%; */ /* calculate by aspect ratio (h / w * 100%) */
	    }
	    .video-container .video {
	      position: absolute;
	      top: 0;
	      left: 0;
	      width: 100%;
	      height: 100%;
	    }		
		
		.canvas-container {
	      position: relative;
	      overflow: hidden;
	      height: 0;
	      padding-top: 100%;	      
	    }	  

	    .canvas-container .canvas {
	      position: absolute;
	      top: 0;
	      left: 0;
	      width: 190px;
	      height: 190px;
	    }
	</style>		
			</div>
		</div>