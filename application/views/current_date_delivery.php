<!DOCTYPE html>
<html>
<head>
<title>Home</title>
    <!-- Bootstrap -->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <link href="<?php echo base_url().'asset/css/bootstrap.min.css'; ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url().'asset/css/meat_factory.css'; ?>" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'asset/css/bootstrap-responsive.css'; ?>" />
    <link type="text/css" href="<?php echo base_url().'asset/css/ui-lightness/jquery-ui-1.9.2.custom.min.css'; ?>" rel="stylesheet" />
    <script src="<?php echo base_url().'asset/js/jquery-1.8.3.min.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/jquery-ui-1.9.2.custom.min.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/bootstrap.min.js'; ?>"></script>
</head>
<style media="print, screen">
body
{
	margin:0px auto;
}
.main
{
	width:100%;
	height:auto;
	position:absolute;
	top:0px;
	left:0px;
	text-align:center;
}
#title,#delivery_date
{
	width:100%;
	height:auto;
	position:relative;
	top:0px;
	left:0px;
	text-align:center;
}
#delivery_detail
{
	width:100%;
	height:auto;
	padding:20px;
	position:relative;
	top:0px;
	left:0px;
	overflow:hidden;
}
#copyright_area
{
	text-align:center;
	width:100%;
	height:auto;
	position:relative;
	top:0px;
	left:0px;
}
#detail
{
	width:auto;
	max-width:785px;
	max-height:580px;
	border-width:thin;
}

</style>
<body>
<div class="main">
<div id="title">
<h1><?php echo $title ?></h1>
</div>
<div id="delivery_date">
<h2><?php echo $currentdate ?></h2>
</div>
<div id="delivery_detail">
<table id="detail" border="1">
<tr><td><h4>Company&nbsp; / &nbsp; Product</h4></td>
<?php
	/*
		list all deliveried goods 
	*/
	$productrownumber = count($getproductlist);
	$i=0;
	for($i=0;$i<$productrownumber;$i++)
	{
?>
         	<td><?php echo $getproductlist[$i];?></td>
<?php
	}
?>
</tr>
<?php
	/*
		list the deliveried company
	*/
    $companyrownumber = count($getcompanylist);
	$j=0;
	for($j=0;$j<$companyrownumber;$j++)
	{
?>
	<tr><td><?php echo $getcompanylist[$j];?></td>
    	
    	<?php
			/*
				list all deliveried goods' qty
			*/
			foreach($gettoprint as $printrow)
			{
				$companyname = $printrow['companyname'];
				$productarray = $printrow['deliverydetail'];
				if($getcompanylist[$j]==$companyname)
				{
					for($i=0;$i<$productrownumber;$i++)
					{
						foreach($productarray as $deliveryrow)
						{
							if($getproductlist[$i]==$deliveryrow['productname'])
							{
								?>
                                <td><?php echo $deliveryrow['qty']; ?></td>
                                <?php
								break;
							}
						}
						if($getproductlist[$i]!=$deliveryrow['productname'])
						{
							?>
                            <td></td>
                            <?php
						}
					}
				}
			}
		?>
    
    
    
    </tr>
<?php
	}
?>

</table>
</div>
<div id="copyright_area">
	<p>&copy; 2013 SH & CJ QUALITY MEATS & POULTRY</p>
    <p>301 Liverpool Road, Ashfield, NSW</p>
</div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        window.print();
    });
</script>
</html>