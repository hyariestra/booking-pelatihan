


<div class="box">

	<div class="box-header">

		<h3 class="box-title">Jadwal Futsal</h3>
<?php  echo tgl_indo($tanggal1); 


?>
	</div>
	<div class="box-body">
        <div class="col-md-3">

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalBooking">Tambah Jadwal</button>
            <div class="cleardiv"> </div>
            Keterangan Warna
            <td class="fc-event-container">
                <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#82CF31;border-color:#82CF31">
                    <div class="fc-content">
                       <span class="fc-title">Status Booking Sudah DP</span>
                   </div>
               </a>
           </td>
           <td class="fc-event-container">
            <a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:orange;border-color:orange">
                <div class="fc-content">
                   <span class="fc-title">Status Booking Belum DP</span>
               </div>
           </a>
       </td>

       <table class="table">

        <thead>

            <tr>

                <th>No</th>

                <th>Nama Pembooking</th>
               

                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach ($forkalender['forcall'] as $key => $value):?>
               
          

            <tr>
               <td><?php echo $key+=1; ?></td>

               <td style="color:white;background-color: <?php echo $value['color']; ?>"><?php echo $value['title']; ?></td>
              
             
               
               <td style="width: 70px;">
                <button onclick="editdata(this)" class="btn btn-xs btn-warning">
                    <a data-toggle="tooltip" title="" onclick="openPage(this)" style="padding:0px !important; color:white; font-size:12px; font-family:tahoma;" data-original-title="Menu Penjaaaaualan"> <span class="glyphicon glyphicon-pencil"></span></a>
                </button>
                <button onclick="editdata(this)" class="btn btn-xs btn-danger">
                   <a data-toggle="tooltip" title="" onclick="openPage(this)" style="padding:0px !important; color:white; font-size:12px; font-family:tahoma;" data-original-title="Menu Penjaaaaualan"> <span class="glyphicon glyphicon-trash"></span></a>
               </button>
           </td>
       </tr>

       <?php endforeach ?>

        </tbody>

    </table>
</div>
<div class="col-md-9">

  <div style="border-style: groove;" id='calendar'></div>
</div>

</div>


</div>


<div id="modalBooking" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- <?php echo 

$tanggal = '2017-11-21T10:30:00';
$pieces = explode("T", $tanggal);
echo $pieces[0];
echo $pieces[1];
echo tgl_indo($pieces[0]).'-'.$pieces[1];
 ?> -->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukan Nama Pemesan dan Jadwal</h4>
    </div>
    <div class="modal-body">
        <form id="formTambahKelompok">   
         <div class="form-group">
             <label>Nama Pemesan</label>
             <input type="text" id="judul" name="title" class="form-control">
         </div>
         <div class="form-group">
            <label>Tanggal dan Jam Mulai</label>
            <div class="input-group date form_datetime" data-date="<?=tanggal_sekarang();?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
            <input type="text" id="dtp_input1" name="startdate" value="" /><br/>
        </div>
        <div class="form-group">
            <label>Tanggal dan Jam Selesai</label>
            <div class="input-group date form_datetime" data-date="<?=tanggal_sekarang();?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                <input class="form-control" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
            <input type="text" id="dtp_input2" name="enddate"  value="" /><br/>
        </div>

        <div class="form-group">
            <label>Status Booking</label>
            <select class="form-control" name="status">
                <option value="">Pilih Status</option>
                <option value="Booking">Booking</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
    </form>
</div>

<div class="modal-footer">      
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
    <button type="button" class="btn btn-primary" onclick="simpanBook()">Simpan</button> 
</div>
</div>

</div>
</div>


<?php
function tanggal_sekarang($time=FALSE)
{
    date_default_timezone_set('Asia/Jakarta');
    $str_format='';
    if($time==FALSE)
    {
        $str_format= date("Y-m-d");
    }else{
        $str_format= date("Y-m-d H:i:s");
    }
    return $str_format;
}
?>

<script type="text/javascript">

	$(document).ready(function()
	{
		var kalender = <?php echo json_encode($kalender); ?>;
       console.log(kalender.call);

       var initialLocaleCode = 'id';
       $('#calendar').fullCalendar({
         header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        defaultDate: '<?=tanggal_sekarang();?>',
        locale: initialLocaleCode,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: 
            kalender.call,
            eventRender: function(event, element) {
      $(element).tooltip({title: event.title});             
  }

        });

   });

   $('.form_datetime').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});

   function simpanBook()
    {
      
        var target = "<?php echo site_url("admin/Calendar/simpanBook")?>/";
        data = $('#formTambahKelompok').serialize();

        if ($("#judul").val()=='') 
        {
            alert('Nama Pemesan Kosong');
            return false;
        }
        $.post(target,data,function(e)
        {
            var js = $.parseJSON(e);
            if (js.flag) {
                alert('Data Berhasil di Update');
            }else{
                alert('gagal :( ');
            }
            location.reload();
        });
        $('#modalBooking').modal("hide");
        $('#modalBooking').remove("hide");
    }

    function loadpage(){  
        var loadhtml = "<?php echo site_url("admin/Calendar/tampil")?>";
        $(".box-body").load(loadhtml);  
    }

</script>




