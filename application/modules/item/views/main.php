<style type="text/css">

span.text {
    color: #555555 !important;
    font-size: 13px !important;
    position: inherit !important;
    transform: translate(0%) !important;
    padding: 6px !important;

}

hr.hrraya{
      margin-top: 0px; 
    margin-bottom: 0px;
    border: 0;
    border-top: 1px solid #eee;
}

input#boh
{
  width: 70% !important;
}

select.ah{
  width: 40px;
}

input#boh
{
  margin-left: 30px;
}



a:hover {
    background-color: yellow;
}

p.title-produk{
    color: #f75400;
}
p.pricetotal{
    color: black;
}
h4.title-price{
    font-family: sans-serif;
    color: #4f4e4e;

}
h3.title-price{
    font-family: sans-serif;
    color: #4f4e4e;
}
ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
li.active{border-bottom:3px solid silver;}

.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
.btn-success{width:100%;border-radius:0;background-color: #f75400;}
.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
.title-price{margin-top:30px;margin-bottom:0;color:black}
.title-attr{margin-top:0;margin-bottom:0;color:black;}
.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}

@media (max-width: 426px) {
    .container {margin-top:0px !important;}
    .container > .row{padding:0 !important;}
    .container > .row > .col-xs-12.col-sm-5{
        padding-right:0 ;    
    }
    .container > .row > .col-xs-12.col-sm-9 > div > p{
        padding-left:0 !important;
        padding-right:0 !important;
    }
    .container > .row > .col-xs-12.col-sm-9 > div > ul{
        padding-left:10px !important;
        
    }            
    .section{width:104%;}
    .menu-items{padding-left:0;}
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-5">
           <div class="single-page">                     
             <!--Include the Etalage files-->
             <link rel="stylesheet" href="<?php echo base_url("theme/css/etalage.css")?>">
             <script src="<?php echo base_url("theme/js/jquery.etalage.min.js")?>"></script>
             <!-- Include the Etalage files -->
             <script>
                jQuery(document).ready(function($){

                    $('#etalage').etalage({
                        thumb_image_width: 400,
                        thumb_image_height: 400,
                        source_image_width: 700,
                        source_image_height: 600,
                        autoplay : false,
                        show_hint: true,
                        click_callback: function(image_anchor, instance_id){
                            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                        }
                    });
                                // This is for the dropdown list example:
                                $('.dropdownlist').change(function(){
                                    etalage_show( $(this).find('option:selected').attr('class') );
                                });

                            });
                        </script>
                        <!--//details-product-slider-->
                        <div class="details-left-slider">
                          <ul id="etalage">
                             <li>
                                <a href="optionallink.html">
                                    <img class="etalage_thumb_image" src="<?php echo base_url("assets/foto_produk/$detail[gambar_produk1]"); ?>" />
                                    <img class="etalage_source_image" src="<?php echo base_url("assets/foto_produk/$detail[gambar_produk1]"); ?>" />
                                </a>
                            </li>
                            <!-- <li>
                                <img class="etalage_thumb_image" src="<?php echo base_url("theme/images/g7.jpg"); ?>" />
                                <img class="etalage_source_image" src="<?php echo base_url("theme/images/g7.jpg"); ?>"/>
                            </li> -->
                            <!-- <li>
                                <img class="etalage_thumb_image" src="<?php echo base_url("theme/images/kaosbumdes.jpg"); ?>" />
                                <img class="etalage_source_image" src="<?php echo base_url("theme/images/kaosbumdes.jpg"); ?>" />
                            </li> -->
                                 <?php 

       for($i = 2;  $i<=4;  $i++)
            {
              ?>
          <?php if ($detail['gambar_produk'.$i]==''): ?>


          <?php else: ?>
           <li>
             <img class="etalage_thumb_image" src="<?php echo base_url("assets/foto_produk/".$detail['gambar_produk'.$i]); ?>" class="img-responsive" />
             <img class="etalage_source_image" src="<?php echo base_url("assets/foto_produk/".$detail['gambar_produk'.$i]); ?>" class="img-responsive" title="" />
           </li>

         <?php endif ?>
         <?php } ?>

                            <div class="clearfix"></div>
                        </ul>
                    </div>

                    <div class="clearfix"></div>                   
                </div>
            </div>
            <div class="col-md-6">


                <h3><?php echo $detail['nama_produk'] ?></h3>    
                <h4 class="title-price"><i class="fa fa-barcode" aria-hidden="true"></i> Kode Produk : <?php echo $detail['kode_produk'] ?> </h4>
                <hr>
                <h4 id="getberat" class="title-price"><i class="fa fa-briefcase" aria-hidden="true"></i> Berat Produk : <?php echo $detail['berat_produk'] ?> Gram </h4>
                <hr>
                <h4 class="title-price"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Stok : <?php echo $detail['stok_produk'] ?> </h4>
                <hr>
                <h4 id="getharga" class="title-price"><i class="fa fa-tag" aria-hidden="true"></i> Harga : Rp <?php echo  number_format($detail['harga_produk']); ?></h4>

                <hr>

                    <!-- <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>CANTIDAD</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div> -->                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span style="margin-right:20px;color: white;" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><b>Beli</b></button>

                    </div>          

                    <h4 class="title-price"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Deskripsi Produk</h4>

                   <?php echo $detail['keterangan_produk'] ?>
                </div>
                <br>
                <br>
            </div>   
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="width:60%;">
                <form  id="myForm" role="form" data-toggle="validator" accept-charset="utf-8">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pembelian</h4>
                  </div>
                  <div class="modal-body" style="padding: 0px 0px 0px 0px;">

                     <div class="col-md-12">
                        <div class="col-md-12">


                          <div class="col-md-6">
                            <p>Nama Produk : </p>
                            <p id="produktitle" class="title-produk"><?php echo $detail['nama_produk'] ?></p>
                            <hr class="hrraya">
                          <p>Masukan Ukuran Dan Jumlah : </p>

                            <table>
                              <tr>
                                <th><p>Ukuran</p></th>
                                <th><p style="margin-left: 30px;" >Jumlah</p></th>

                              </tr>
                              <tbody id="tabs">
                                <tr>
                                  <td>
                                    <select id="ah" name="ukuran[]" class="form-control">
                                      <option value="L">L</option>
                                      <option value="M">M</option>
                                      <option value="S">S</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input id="boh" class="form-control" onblur="gettotalitem()" type="number" name="jumlahdet[]"></td>
                                  <td><button style="margin-bottom: 6px;"  class="btn" title="Tambah Item" onclick="addrow()" type='button'><span style="color: white;" class="glyphicon glyphicon-plus"></span></button> </td>
                                </tr>
                              </tbody>
                            </table>
                       
                        
                        </div>

                        <div class="col-md-6">
                            <p>Akumulasi Harga Produk : </p>
                           <div class="row">  
                             
                             <div class="col-md-6">
                                    <p class="pricetotal"><b><div id="idtotal">-</div></b></p>
                                </div>
                           </div>

                            <input min="1" value="1" type="hidden" onchange="getopo();" class="form-control" id="idjumlah" name="idjumlah">

                        </div>
                        <!-- <div class="col-md-6">
                            <p>Catatan Untuk Produk : </p>
                            <textarea  name="catatan" placeholder="masukan Catatan,Contoh: Warna Putih/Ukuran XL/Edisi ke-2" rows="5" class="form-control"></textarea>
                        </div> -->
                    </div>
                </div>

                <div style="margin-top: 30px;" class="col-md-12">
                    <div style="border: 0.01em solid #ff00001c;background-color: #f7f7f7"; class="col-md-12">
                        <div class="col-md-6">
                            <p>Nama Penerima</p>
                            <input id="idnamapenerima" value="<?php $sess = $this->session->userdata('pelanggan'); echo $sess['nama_users'] ?>" type="text" class="form-control" name="namapenerima">
                        </div>
                        <div class="col-md-6">
                            <p>No HP/Telp Penerima</p>
                            <input id="idtelppenerima" value="<?php echo $sess['telp'] ?>" type="text" class="form-control" name="telppenerima">
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                             <p>Kota Tujuan</p>

                             <select class="selectpicker show-tick form-control" data-live-search="true" id="id_kota" name="id_kota" onchange="getopo();" >  

                                <option value="">Pilih Kota</option>

                                <?php foreach ($kota as $key => $value): ?>

                                    <option value="<?php echo $value['city_id']; ?>" >

                                        <!-- <?php echo $value['city_id']; ?>  -->

                                        <?php echo $value['type']; ?> 

                                        <?php echo $value['city_name']; ?>, 

                                        <?php echo $value['province']; ?> 

                                        <?php echo $value['postal_code']; ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                       <div class="form-group">
                           <p style="margin-bottom: 5px;">Ekspedisi</p>

                           <select  class="form-control" id="jasaekspedisi" name="jasaekspedisi" onchange="getopo();">

                            <option value="pos">POS Indonesia</option>


                            <option value="tiki">TIKI</option>


                            <option value="jne">JNE</option>

                        </select>

                    </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <p style="margin-bottom: 5px;">Paket Pengiriman</p>

                    <select class="form-control" id="paket">

                        <option value="">Belum Ada Paket Untuk dipilih</option>

                    </select>

                </div>
            </div>


            <div class="col-md-8">
                <p>Masukan Alamat Detail</p>
                <textarea name="alamatdetail" class="form-control"></textarea>
            </div>
            <div class="col-md-4">

             <div class="form-group">
              <p style="visibility: hidden;margin-top: 3px;">Paket</p>
              <button class="btn" title="Hitung biaya pengiriman" onclick="hitung(this);" type='button'> <span style="color: white;" class="glyphicon glyphicon-refresh"></span> Hitung Biaya</button> 
          </div>
      </div>


      <div class="col-md-12">


        <div style="margin-top: 20px;" class="col-md-4">
           <div class="form-group">
               <p>Estimasi Waktu pengiriman</p>

               <div style="font-family: sans-serif; font-size: 14px;" id="waktup">-</div>


           </div>
       </div>

       <div style="margin-top: 20px;" class="col-md-4">
           <div class="form-group">
               <p>Biaya Pengiriman</p>

               <div style="font-family: sans-serif; font-size: 14px;" id="biayap">-</div>

           </div>
       </div>

       <div style="margin-top: 20px;" class="col-md-4">
           <div class="form-group">
               <p>Subtotal</p>

               <div  style="font-family: sans-serif; font-size: 14px;font-weight: 10" id="totalp">-</div>

           </div>
       </div>

   </div>

   <div class="col-md-12">
       <input type="hidden" class="form-control" id="inputhiddentotal" name="totalhargabarang">
       <input type="hidden" id="ongkir" name="ongkir">
       <input type="hidden" id="etd" name="etd">  
       <input type="hidden" id="subtotalz" name="subtotalz">
       <input type="hidden"  value="<?php echo $detail['id_produk'] ?>" name="idproduk">
       <input type="hidden"  value="<?php echo $detail['nama_produk'] ?>" name="namaproduk">
       <input type="hidden" value="<?php echo $detail['harga_produk'] ?>" id="hargasatuan" name="hargasatuan">
       <input type="hidden" value="<?php echo $detail['berat_produk'] ?>" id="berat" name="berat">

       <textarea style="visibility: hidden;" id="ekspedisi" name="ekspedisi"></textarea>
       <textarea style="visibility: hidden;" id="paketekspedisi" name="paketekspedisi"></textarea>

       <textarea style="visibility: hidden;" id="address" name="address"></textarea>
       <input type="hidden" name="kode_pembelian" class="form-control" value="<?php echo $kd_pem ?>" readonly>
   </div>


</div>
</div>
</form>
<div class="modal-footer">
      <button onclick="simpandata(this)"  type="button" class="btn btn-success"><span style="margin-right:20px;color: white;" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><b>Beli Produk Ini</b></button>
</button>


</div>

</div>

</div>
</div>





</div>



<script type="text/javascript">

    $(document).ready(function(){



        var zz = $("input[name='idjumlah']").val();
        var mentah = $('#getharga').text();
        var m2 = mentah.replace(/,| Harga : Rp |\.00/g,'');
        var kill = zz*m2
        var them = format2(eval(kill),"");

        $('#idtotal').html(them); // add them and output it
         document.getElementById('idtotal').value = them;
         document.getElementById('inputhiddentotal').value = kill;
      


        var po = $('#produktitle').text();
        
        $('#namaproduk').val(po);



        $('#provinsi').change(function(){

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax

            var prov = $('#provinsi').val();

            $.ajax({
                type : 'GET',
                url : '<?php echo site_url('item/datakabupaten') ?>',
                data :  'prov_id=' + prov,
                success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });
    });


 $('input').keyup(function(){ 
    var firstValue  = Number($('#idjumlah').val());   // get value of field
    var mentah = $('#getharga').text();
    var m2 = mentah.replace(/,| Harga : Rp |\.00/g,'');
    var kill = firstValue*m2
    var me = format2(eval(kill),"");
    $('#idtotal').html(me); // add them and output it
    document.getElementById('idtotal').value = me;
    document.getElementById('inputhiddentotal').value = kill;

// add them and output it
});




 function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1.");
}

function simpandata()
{
    var target ="<?php echo site_url('item/simpanpembelian'); ?>";
        data = $('#myForm').serialize();


        if ($('#boh').val() =='') {
          alert('jumlah masih kosong');
          return false;
        }
        else if($('#idnamapenerima').val()=='')
        {
           alert('Nama Penerima Masih kosong');
          return false;
        }else if($('#idtelppenerima').val()=='')
        {
           alert('Nomor Telp masih kosong');
          return false;
        }

        $.post(target, data, function(e){

            var json = $.parseJSON(e);

            window.location = "<?php echo site_url("item/success")?>?nmb="+json.kode;

        });
}

function cekharga()
{   
    var kill   = $('#inputhiddentotal').val();
    var kabupaten = $("#kabupaten").val();
    var provinsi = $("#provinsi").val();
    var kurir = $('#kurir').val();
    var berat = $('#berat').val();

    var mentah = $('#getberat').text();
    var beratreplace = mentah.replace(/Berat Produk : /g, '').replace(/ Gram/g, '');

    console.log(beratreplace);

}


  function getopo()
  {
      $("#paket").html("");
      var idjum =  $('#idjumlah').val();
      var id = $('#id_kota').val();   
      var idx = $('#jasaekspedisi').val();   
      var idb = $('#berat').val();   

      console.log(idjum);
      var target  = "<?php echo site_url("item/getongkos")?>";
      data        = {
        id_kota : id,
        jasaekspedisi : idx,
        berat : idb,
        jumlah : idjum

    }


    $.post(target, data, function(e){

        var json = $.parseJSON(e);
           /* console.log(json.rajaongkir);
           return false;*/
           var jenis = json.rajaongkir.results[0].costs;
           $.each(jenis,function(i,v){
            //console.log(v);
            var service = v.service;
            var cost = v.cost[0].value;
            var etd =v.cost[0].etd;
            $("#paket").append("<option value='"+service+"#"+cost+"#"+etd+"'>"+service+"</option>");
        });
           
           
       });

}

function hitung(obj)
{

 var str = $('#paket').val();
 var spl = str.split('#');
 zero     = spl[0];
 one     = spl[1];
 two     = spl[2];

 var total = $('#inputhiddentotal').val();
 var subtotals = parseInt(total)+parseInt(one);
 var chosen = $("#id_kota option:selected").text(); 
 var eks = $("#jasaekspedisi option:selected").text(); 
 var pkt = $("#paket option:selected").text(); 


 $('#biayap').html(one);
 $('#waktup').html(two);
 $('#totalp').html(format2(eval(subtotals),""));

 $('#etd').val(one);
 $('#ongkir').val(two);
 $('#subtotalz').val(subtotals);
 $('#address').text(chosen);
 $('#ekspedisi').text(eks);
 $('#paketekspedisi').text(pkt);

//console.log(eks);

}

function addrow()
{
   $("#paket").html("");
  var table  = document.getElementById('tabs');

  var row = table.insertRow();

  var ColJum = row.insertCell(0);
  var ColUkuran = row.insertCell(1);
  var ColRemove = row.insertCell(2);

  ColJum.innerHTML = "<select name='ukuran[]' class='form-control'><option value='L'>L</option><option value='M'>M</option><option value='S'>S</option></select>";
  ColUkuran.innerHTML = "<input id='boh' onblur='gettotalitem()'  type='number' name='jumlahdet[]' class='form-control'/>";

   ColRemove.innerHTML = "<button class='btn btn-danger' onclick='removedel(this)' id='rem' title='Hapus' type='button'><span style='color: white;' class='glyphicon glyphicon-trash'></span></button> ";

}

function gettotalitem()
{
   $("#paket").html("");
   var sum = 0;
    $("input[name='jumlahdet[]']").each(function(i,v) {
        sum +=+ Number($(v).val());
      
  // console.log($(v).val());
    });
      $("#idjumlah").val(sum);
  calc();
  getopo();
}

function calc()
{
    var jum = $("#idjumlah").val();
    var mentah = $('#getharga').text();
    var m2 = mentah.replace(/,| Harga : Rp |\.00/g,'');
    var kill = jum*m2;
    var me = format2(eval(kill),"");

    $('#idtotal').html(me); // add them and output it
    document.getElementById('idtotal').value = me;
    document.getElementById('inputhiddentotal').value = kill;

   // console.log(me);

}

function removedel(obj)
{
  

  $(obj).parent().parent().remove();

  gettotalitem();
}

   


</script>


