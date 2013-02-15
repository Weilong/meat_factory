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
	height:590px;
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
<?php
    $productrownumber = count($getproductlist);
    $baselinecontent = 10;
    $numberoftable = ceil($productrownumber/$baselinecontent);
    $a=0; /* loop for create new table */
	$b=0; /* separate product lsit */
    for($a=0;$a<$numberoftable;$a++)
    {
?>
<div id="delivery_detail">
		<p></p>
        <p></p>

        <table id="detail" border="1">
            <tr><td><h4>Company&nbsp; / &nbsp; Product</h4></td>
            <?php
                /*
                    list all deliveried goods 
                */
                $tempproductarray = array();
               	$i=0; 
                while($i<10)
                {
					if($b<$productrownumber)
					{
            ?>
                        <td><?php echo $getproductlist[$b];?></td>
                        
            <?php
						array_push($tempproductarray,$getproductlist[$b]);
					}
					else
					{
						break;
					}
						$b++;
            			$i++;
                }
				$b++;
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
                                /* 循环搜索各个公司是否有符合的商品并且显示数量*/
								$i=0;
								$k=count($tempproductarray);
								while($i<$k)
								{
									$tempname = $tempproductarray[$i];
									$productname="";
									foreach($productarray as $goodrow)
									{
										$productname=$goodrow['productname'];
										if($tempname==$goodrow['productname'])
										{
											?>
                                            <td><?php echo $goodrow['qty']; ?></td>
                                            <?
											break;
										}
									}
									if($tempname!=$productname)
									{
										?>
                                        <td></td>
                                        <?php
									}
										//对于该表格下的的所有产品进行比
									$i++;
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
		<p></p>
        <p></p>
<?php
    }
?>
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