<input type="text" id="panjang" onchange="hitung()" name="">
<br>
<input type="text" id="lebar" onchange="hitung()"  name="">
<br>
<input type="text" id="total" name="">

<script type="text/javascript">
	
	function hitung() 
	{

		 var p = $('#panjang').val();
		 var l = $('#lebar').val();
		 p = (p=='')?'0': p;
		 l = (l=='')?'0': l;
		 var tot = eval(p)+eval(l);
		 //$('#total').text(tot);
		 $('#total').val(tot);
		 

	}
</script>