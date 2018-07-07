<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <?php $tanggal1=$pembelian['tanggal_pembelian'] ?>
                <small class="pull-right">tanggal:<?php  echo tgl_indo($tanggal1); ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      Dari
      <address>
        <strong><?php echo tampil_pengaturan("nama_usaha"); ?></strong><br>
        Alamat : <?php echo tampil_pengaturan("alamat_usaha") ?><br>
        Email : <?php echo tampil_pengaturan("email_usaha"); ?><br>
        Telepon : <?php echo tampil_pengaturan("telepon_usaha"); ?>
      </address>
    </div><!-- /.col -->
    <div class="col-sm-4 invoice-col">
      Kepada
      <address>
        <strong><?php echo $pembelian['nama_pelanggan']; ?></strong><br>
        <?php echo $pembelian['alamat_pengiriman'] ?><br>
        <?php echo $pembelian['email_pelanggan'] ?><br>
        <?php echo $pembelian['telepon_pelanggan'] ?>
      </address>
    </div><!-- /.col -->
    <!-- /.col -->
  </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($detail as $key => $value): ?>
                	<?php $subtotal=$value['jumlah_beli']*$value['harga_beli']; ?>
                  <tr>
                  	<td><?php echo $key+=1 ?></td>
                    <td><?php echo $value['nama_beli']; ?></td>
                    <td><?php echo $value['jumlah_beli']; ?></td>
                    <td>Rp.<?php echo number_format($value['harga_beli']); ?></td>
                    <td>Rp.<?php echo number_format($subtotal) ?></td>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <!-- <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="../../dist/img/credit/visa.png" alt="Visa">
              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../../dist/img/credit/american-express.png" alt="American Express">
              <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div> --><!-- /.col -->
            <div class="col-xs-6">
             <!--  <p class="lead">Amount Due 2/22/2014</p> -->
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Total Belanja:</th>
                    <td>Rp.<?php echo number_format($pembelian['total_pembelian']); ?></td>
                  </tr>
                  <tr>
                    <th>Total Ongkos Kirim:</th>
                    <td>Rp.<?php echo number_format($pembelian['biaya_pengiriman']); ?></td>
                  </tr>
                  <tr>
                    <th>Total Bayar</th>
                    <td>Rp.<?php echo number_format($pembelian['total_bayar']); ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <!-- <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div> -->
        </section>