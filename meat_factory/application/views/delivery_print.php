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