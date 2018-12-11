<?php 	
	function writeSpacer($max=1){		
		$spacer = "<span style='display:block;width:1px;height:1px;'>&nbsp;</span>";
		$produced_spacer ="";
		for($i=0;$i<$max;$i++){
			$produced_spacer .= $spacer;
		}
		return $produced_spacer;
	}

	function writeRowSpacer($max=1){		
		$spacer = "<div style='display:block;width:1px;height:1px;'>&nbsp;</div>";
		$produced_spacer ="";
		for($i=0;$i<$max;$i++){
			$produced_spacer .= $spacer;
		}
		return $produced_spacer;
	}
 ?>
<html>
<head>
	 <link rel="stylesheet" href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css').'?rand='.mt_rand(); ?> ">
</head>
<body>
<style>
	/* @page { sheet-size: 113mm 210mm; } */

	#invoice{
		height:500px;
		width:800px;
		border:1px solid red;	
	}

	#product_image{
		/*margin-top:100px;*/		
		height: 100px;
		width: 100px;
	}
	
	#invoice div.col {
		positon:absolute;
		top: 10px;
		left: 0px;
	}
	
	/*table#invoice_content td:nth-child(2){
		background:#0cc;
	}
	table#invoice_content td:nth-child(3){
		background:#c0c;
	}
	table#invoice_content td:nth-child(4){
		background:#dec;
	}
	table#invoice_content td:nth-child(5){
		background:#f0c;
	}
	table#invoice_content td:nth-child(6){
		background:#ccc;
	}*/

</style>
<?php 
	// $product['name'] = "Kalung Italy";
	// $product['image'] = base_url('assets/img/neclace.jpg');
	// $product['weight'] = "10 g";
	// $product['price'] = "19.000.000,-";
	// $product['priceinword'] = "SEMBILAN BELAS JUTA RUPIAH";
	// $product['trx'] = "19 December 2018";
	// $product['invoice'] = "INV19122018";
	// $product['barcode'] = "KL-INV19122018";
	// $product['cashier'] = "Kasir 1";
	
	$filename = "code128";		

	$default_value = array();
	$default_value['output'] = 1;
	$default_value['dpi'] = 72;
	$default_value['thickness'] = 30;
	$default_value['res'] = 1 ;
	$default_value['rotation'] = 0.0;
	$default_value['font_family'] = 'Arial.ttf';
	$default_value['font_size'] = 8;
	$default_value['text2display'] = $product['barcode'];
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

	// $theimage = '<img src="http://localhost:85/courses/derry/development/assets/library/barcodegen.1d-php5.v2.2.0/html/image.php?code=' . $filename . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';									
	function genbarcode ($filename,$output, $dpi, $thickness,  $res, $rotation , $text2display , $font_family , $font_size , $a1 ,$a2, $a3){ return '<img src="http://localhost/courses/derry/development/assets/library/barcodegen.1d-php5.v2.2.0/html/image.php?code=' . $filename . '&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" />';	}
?>
<div id="invoice">
	<div class="row">
		<div class="col">	
			<?php echo writeRowSpacer(2); ?>			
			<?php echo writeSpacer(140); ?>												
			<span style="font-weight:100;font-size:.3em;"><small><?php echo $product['trx']; ?></small></span>
		</div>
		<div>
			<?php echo writeSpacer(140); ?>						
			<span class="product_invoice" style="font-weight:bold;font-size:1.5em;"><?php echo $product['invoice']; ?></span>
		</div>
	</div>
	<div class="row product">
		<?php echo writeRowSpacer(1); ?>			
		<table id="invoice_content">
			<thead>
				<tr>
					<th style="white-space:nowrap;width:2cm;text-align: center;"></th>
					<th style="white-space:nowrap;width:5cm;text-align: center;"></th>
					<th style="white-space:nowrap;width:9cm;text-align: center;"></th>
					<th style="white-space:nowrap;width:2cm;text-align: center;"></th>
					<th style="white-space:nowrap;width:2cm;text-align: center;"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="white-space:nowrap;"></td>
					<td style="white-space:nowrap;">
						<?php echo writeRowSpacer(5); ?>			
						<img id="product_image" src="<?php echo $product['image']; ?>" />
					</td>
					<td style="white-space:nowrap;"><?php echo "<div>";		
			echo  $product['name']; 						
			echo "<div>";		
			echo genbarcode ($filename,$output, $dpi, $thickness,  $res, $rotation , $product['barcode'], $font_family , $font_size , $a1 ,$a2, $a3);												
			echo "</div>";
			echo "</div>"; ?></td>
					<td style="white-space:nowrap;text-align: center;"><?php echo $product['weight']; ?></td>
					<td style="white-space:nowrap;text-align: center;"><?php echo $product['price']; ?></td>
				</tr>							
				<tr>
					<td style="white-space:nowrap;"></td>
					<td nowrap="nowrap" colspan="3" style="font-weight:bold;font-size:.2em;white-space:nowrap;padding-left: 1.5cm;"><?php echo $product['priceinword']; ?></td>					
					<td style="font-weight:bold;font-size:.2em;white-space:nowrap;text-align: right;"><?php echo $product['price']; ?></td>
				</tr>
				<tr>					
					<td style="white-space:nowrap;"></td>
					<td colspan="3" style="white-space:nowrap;">&nbsp;</td>					
					<td style="white-space:nowrap;text-align: center;font-weight: bold;"><?php echo $product['cashier']; ?></td>
				</tr>
			</tbody>
		</table>		
	</div>
</div>


<!-- <script type="text/javascript"> try { this.print(); } catch (e) { window.onload = window.print; } </script> -->	
