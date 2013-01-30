<?php 
	$a = json_decode($accountdetail);
	foreach($a as $row)
	{
		$phone = $row->phone;
		$fax = $row->fax;
		$address = $row->address.', '.$row->suburb.', '.$row->city.', '.$row->state.', '.$row->country.', '.$row->postcode;
	}
	$b = json_decode($invoicedetail);
	foreach($b as $row)
	{
		$invoiceid = $row->invoiceid;
		$invoicedate=$row->inputdate;
	}
?>
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
<style>
.invoice
{
	width:960px;
	height:auto;
	margin:0px auto;
	text-align:center;
	overflow:hidden;
}
.invoice_head
{
	width:100%;
	height:300px;
}
#client_info
{
	width:450px;
	height:auto;
	text-align:left;
	float:left;
}
#invoice_info
{
	width:450px;
	height:auto;
	text-align:right;
	float:right;
}
#invoice_detail
{
	height:auto;
	width:100%;
}
#invoice_footer
{
	width:100%;
	text-align:right;
	height:auto;
}
</style>
<body>
<div class="invoice">
    <p><h1>Tax Invoice</h1></p>
   	<div class="invoice_head"> 
        <div id="client_info">
            <p>Account Name: <?=$account?></p>
            <p>Telephone: <?=$phone?></p>
            <p>Fax: <?=$fax?></p>
            <p>Service Address: <?=$address?></p>
        </div>
        <div id="invoice_info">
                <strong><p>SH & CJ QUALITY MEATS & POULTRY</p>
                <p>301 Liverpool Road, Ashfield, NSW</p>
                <p>Telephone: 02 97980136</p>
                <p>ABN: 12548021784</p>
                <p>Invoice number:	<?=$invoiceid?></p>     
                <p>Invoice Date:	<?=$invoicedate?></p></strong>
        </div>
    </div>
    <div id="invoice_detail">
        <table id="invoice_detail" border='1'>
            <tr><th>Description</th><th>QTY</th><th>Price</th><th>Total</th></tr>
            <?
				$c = json_decode($orderdetail);
				$amount =0;
				foreach ($c as $row)
				{
					$description = $row->description;
					$qty = $row->qty;
					$price = $row->price;
					$total = $row->total;
					$amount += $total;
					?>
                    <tr>
                    	<td><?=$description?></td>
                        <td><?=$qty?></td>
                        <td><?=$price?></td>
                        <td><?=$total?></td>
                    </tr>
                    <?
				}
			?>
            <tr><td colspan="4" height="15px"></td></tr>
            <tr><td align="right" colspan="4">Amount: <?=$amount?></td></tr>
        </table>
    </div>
    <div id="invoice_footer">
    	<br/>
        <br/>
        <p>Invoice number: <?=$invoiceid?></p>
        <p>Tax invoice-date issued: <?=date('Y-m-d')?></p>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        window.print();
    });
</script>
</html>