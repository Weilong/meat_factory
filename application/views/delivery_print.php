<style>
.invoice
{
	width:960px;
	height:auto;
	margin:0px auto;
	text-align:center;
}
.invoice_head
{
	width:100%;
	position:absolute;
	height:auto;
}
#client_info
{
	width:450px;
	height:auto;
	position:absolute;
	top:0px;
	text-align:left;
}
#invoice_info
{
	width:450px;
	height:auto;
	position:absolute;
	top:0px;
	left:510px;
	text-align:right;
}
#invoice_detail
{
	position:absolute;
	top:10px;
	left:0px;
	padding:10px;
}
</style>
<div class="invoice">
    <p><h1>Tax Invoice</h1></p>
   	<div class="invoice_head"> 
        <div id="client_info">
            <p>Account Name:</p>
            <p>Telephone:</p>
            <p>Fax:</p>
            <p>Service Address:</p>
        </div>
        <div id="invoice_info">
                <p>SH & CJ QUALITY MEATS & POULTRY</p>
                <p>301 Liverpool Road, Ashfield, NSW</p>
                <p>Telephone: 02 97980136</p>
                <p>ABN: 12548021784</p>
                <p>Invoice number:	<? ?></p>     
                <p>Invoice Date:	<? ?></p>
                <p>Amount:	<? ?></p>
        </div>
    </div>
    <div id="invoice_detail">
        <table>
            <tr><th>Description</th><th>QTY</th><th>Price</th><th>Total</th></tr>
        </table>
    </div>
    <div id="invoice_footer">
        <table>
            <tr><td>(Total amount)</td></tr>
            <tr><td>Invoice number</td></tr>
            <tr><td>Tax invoice-date issued: </td></tr>
        </table>
    </div>
</div>