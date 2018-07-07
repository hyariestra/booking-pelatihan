<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getCalendar($month,$year){

	// Draw table for Calendar
	$calendar = '
	<table cellpadding="0" cellspacing="0" class="calendar">';

		// Draw Calendar table headings
		$headings = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
		$calendar.= '
	<tr class="calendar-row">
	<td class="calendar-day-head">'.implode('</td>
	<td class="calendar-day-head">',$headings).'</td>
	</tr>
	';

		//days and weeks variable for now ...
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		// row for week one
		$calendar.= '
	<tr class="calendar-row">';

		// Display "blank" days until the first of the current week
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '
	<td class="calendar-day-np"> </td>
	';
			$days_in_this_week++;
		endfor;

		// Show days....
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			if($list_day==date('d') && $month==date('n'))
			{
				$currentday='currentday';
			}else
			{
				$currentday='';
			}
			$calendar.= '
	<td class="calendar-day '.$currentday.'">';

				// Add in the day number
				if($list_day<date('d') && $month==date('n'))
				{
					$showtoday='<strong class="overday">'.$list_day.'</strong>';
				}else
				{
					$showtoday=$list_day;
				}
				$calendar.= '
	<div class="day-number">'.$showtoday.'</div>
	';

			// Draw table end
			$calendar.= '</td>
	';
			if($running_day == 6):
				$calendar.= '</tr>
	';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '
	<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		// Finish the rest of the days in the week
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '
	<td class="calendar-day-np"> </td>
	';
			endfor;
		endif;

		// Draw table final row
		$calendar.= '</tr>
	';

		// Draw table end the table
		$calendar.= '</table>
	';

		// Finally all done, return result
		return $calendar;
	}

	
	function convertBulan($bulan)
	{
		switch($bulan){
			case 1:
			$bln = "Januari";
			break;
			case 2:
			$bln = "Februari";
			break;
			case 3:
			$bln = "Maret";
			break;
			case 4:
			$bln = "April";
			break;
			case 5:
			$bln = "Mei";
			break;
			case 6:
			$bln = "Juni";
			break;
			case 7:
			$bln = "Juli";
			break;
			case 8:
			$bln = "Agustus";
			break;
			case 9:
			$bln = "September";
			break;
			case 10:
			$bln = "Oktober";
			break;
			case 11:
			$bln = "November";
			break;
			case 12:
			$bln = "Desember";
			break;
		}
		
		return $bln;
		
	}
	
 	//GenerateTokenPosting

	if ( ! function_exists('GenerateTokenPosting') )

	{

		function GenerateTokenPosting($nomor)

		{

			$CI=& get_instance();



			$strUnitKerja = $_SESSION['KodeUnitKerja'];

			$strUPTD	  = $_SESSION['KodeUPTD'];

			$strUPTD 	  = ($strUPTD == '') ? '0' : $strUPTD;


			$tokenSequence = $strUnitKerja.'#'.$strUPTD.'#'.RealDateTime('Year').'.'.RealDateTime('Month').'.'.RealDateTime('Day').'.'.RealDateTime('Time').'#'.$nomor;



			return $tokenSequence;

		}

	} //if ( ! function_exists('GenerateTokenPosting') )



	//setFilterCookieDate()

	if ( ! function_exists('setFilterCookieDate') )

	{

		function setFilterCookieDate($tanggal = '', $tipe = 'startDateFilter')

		{

			$CI = & get_instance();

			$CI->session->set_userdata($tipe, $tanggal);

		}



	} //if ( ! function_exists('setFilterCookieDate') )


 	//getSettingPenandatangananPTU()

	if ( ! function_exists('getSettingPenandatangananPTU') )

	{

		function getSettingPenandatangananPTU($modul='SPP', $posisi = 'kanan')

		{

			$CI = & get_instance();

			$IDUnitKerja 	= $_SESSION['IDUnitKerja'];

	  		$strValueUPTD   = GetSQLUPTDValue('select','value');

			$data = $CI->db->query("select * from sys_setting_penanggungjawab_ptu
									where id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD."
									and posisi = '$posisi'
									and modul  = '".$modul."' ");

			$arrData = array("wilayah" => $data->first_row()->kota,
							 "tanggal" => $data->first_row()->tanggal,
							 "jabatan" => $data->first_row()->jabatan,
							 "nama"    => $data->first_row()->nama,
							 "nip" 	   => $data->first_row()->nip);

			return $arrData;

		}



	} //if ( ! function_exists('setFilterCookieDate') )


	//getFieldValue()

	if ( ! function_exists('getFieldValue') )

	{

		function getFieldValue($table = '', $field, $sqlWhere)

		{

			$CI = & get_instance();

			$data = $CI->db->query("select COALESCE(".$field.", '0') as strValue from ".$table." where ".$sqlWhere);

			return ($data->num_rows() > 0) ? $data->first_row()->strValue : '0';

		}



	} //if ( ! function_exists('getFieldValue') )



	//RealDateTime

	if ( ! function_exists('RealDateTime') )

	{

		function RealDateTime($formatType = '', $includeTime = true, $tipeFilterDate = '')

		{

			$CI =&get_instance();

			//Penyesuaian Pengambilan tanggal format date time indonesia

			//karena bisa jadi TimeZone di server berbeda

			//--------------------------------------------------------------------------

			$tahunPeriode = GetTahunPeriode(); //tahun di ambil dari periode transaksi

			$serverDate = mktime(date("G"), date("i"), date("s"), date("n"), date("j"), $tahunPeriode);

			$diffGMT = substr(date("O", $serverDate), 1, 2);

			$dateDiffGMT = 60 * 60 * $diffGMT;


			if (substr(date("O", $dateDiffGMT), 0, 1) == '+')

				$GMTDate = $serverDate - $dateDiffGMT;

			else

				$GMTDate = $serverDate + $dateDiffGMT;


			$DateDiffIndonesian = 60 * 60 * 7;

			$newDate = date($tahunPeriode.'-m-d H:i:s', $GMTDate + $DateDiffIndonesian);

			if ($formatType == 'Year') 	 $newDate = date($tahunPeriode, $GMTDate + $DateDiffIndonesian);

			if ($formatType == 'Month')  $newDate = date('m', $GMTDate + $DateDiffIndonesian);

			if ($formatType == 'Day')	 $newDate = date('d', $GMTDate + $DateDiffIndonesian);

			if ($formatType  == 'Time')  $newDate = date('H:i:s', $GMTDate + $DateDiffIndonesian);

			if (!$includeTime) $newDate = date('d-m-'.$tahunPeriode, $GMTDate + $DateDiffIndonesian);



			//--------------------------------------------------------------------------

			//check jika ada filter date ambil dari cookie tanggalnya

			$newDate = ($tipeFilterDate <> '') ? ($CI->session->userdata($tipeFilterDate) <>'')  ? $CI->session->userdata($tipeFilterDate) : $newDate  : $newDate;

			return $newDate;

		}

	}	//if ( ! function_exists('RealDateTime') )



	//strToCurrDB()

	if ( ! function_exists('strToCurrDB') )

	{

		function strToCurrDB($strCurrency, $replace = ',')

		{

			if (substr(trim($strCurrency),0,1) == '(' )
			{
				$strCurrency = str_replace('(', '-', $strCurrency);
				$strCurrency = str_replace(')', '', $strCurrency);
			}

			$strValue = str_replace($replace, '', $strCurrency);

			return  $strValue;

		}

	}//if ( ! function_exists('strToCurrDB') )


	//GetTotal
	if ( ! function_exists('GetTotal') )
	{
		function GetTotal($KodeAkun, $TotalSaldo){

			$TotalSaldo = (GetSaldoNormal($KodeAkun) == 'D') ? $TotalSaldo : $TotalSaldo * - 1;

			return $TotalSaldo;
		}
	}	//if ( ! function_exists('GetTotal') )


	//GetCustomerTitle
	if ( ! function_exists('GetCustomerTitle') )
	{
		function GetCustomerTitle(){

			$jenisIndustri 	=  GetSettingValue('kelompok_industri');
			$jenisUsaha 	=  GetSettingValue('jenis_usaha');

			$strCustomerTitle = ($jenisIndustri == 'Rumah Sakit' || $jenisIndustri == 'Puskesmas') ? 'Pasien' : 'Customer';
			$strCustomerTitle = ($jenisUsaha == 'Perguruan Tinggi')  ? 'Mahasiswa' : $strCustomerTitle;

			return $strCustomerTitle;
		}
	}	//if ( ! function_exists('GetCustomerTitle') )

	//GetSupplierTitle
	if ( ! function_exists('GetSupplierTitle') )
	{
		function GetSupplierTitle(){

			$jenisIndustri =  GetSettingValue('kelompok_industri');

			$strSupplierTitle = 'Pemasok'; //($jenisIndustri == 'Rumah Sakit') ? 'Pemasok' : 'Supplier';

			return $strSupplierTitle;
		}
	}	//if ( ! function_exists('GetCustomerTitle') )

	//GetCOAAkunLinkExclude

	if ( ! function_exists('GetCOAAkunLinkExclude') )

	{

		function GetCOAAkunLinkExclude($kodeAkunList = array())

	  	{



	  		$CI=& get_instance();



	  		$strKodeAkun = '';

	  		foreach ($kodeAkunList as $value)

	  		{

	  			$strKodeAkun.= "'".$value."',";

	  		}



	  		$strKodeAkun = substr($strKodeAkun, 0, strlen($strKodeAkun) - 1);



	  		$data = $CI->db->query("SELECT id_akun as IDAkun
	  								FROM ref_akunlink WHERE nama_akunlink IN (".$strKodeAkun.")");

			$arrAkunList = array();

			foreach ($data->result_array() as $row) {

				$dataKodeAkun = $CI->db->query("select concat(kode_induk,'.',kode_akun) as ConcatCode from mst_akun where id_akun = '".$row['IDAkun']."' ");
				$KodeAkun  = $dataKodeAkun->first_row()->ConcatCode;

				$arrAkunList[] =  ($dataKodeAkun->num_rows() > 0)  ? $KodeAkun : '';

			}



	  		return $arrAkunList;

	  	}

	}	//if ( ! function_exists('GetCOAAkunLinkExclude') )



	//formatDateIndo

	if ( ! function_exists('formatDateIndo') )

	{

		function formatDateIndo($paramDate, $separator = '-')

		{

			$arrDateTime = explode(' ', $paramDate);



			$arrDate = (count($arrDateTime) == 1) ? explode($separator, $paramDate) :  explode($separator, $arrDateTime[0]);

			$Year 	 = $arrDate[0];

			$Month 	 = $arrDate[1];

			$Day 	 = $arrDate[2];



			$newDate = $Day.$separator.$Month.$separator.$Year;



			return  $newDate;

		}

	} //if ( ! function_exists('formatDateIndo') )



	//formatDateDB

	if ( ! function_exists('formatDateDB') )

	{

		function formatDateDB($paramDate, $separator = '-')

		{

			$arrDate = explode($separator, $paramDate);

			$Year 	 = $arrDate[2];

			$Month 	 = $arrDate[1];

			$Day 	 = $arrDate[0];



			$newDate = $Year.$separator.$Month.$separator.$Day;



			return  $newDate;

		}

	}	//if ( ! function_exists('formatDateDB') )



	//GetInfo

	if ( ! function_exists('GetInfo') )

	{

		function GetInfo($tipe = '')

		{

			$strInfo = ($tipe == 'notEmpty') ? "Note : <u>tanda dengan garis bawah</u> wajib diisi" : $tipe;



			return $strInfo;

		}

	} //if ( ! function_exists('GetInfo') )

	//GetClientID
	if ( ! function_exists('GetClientID') )

	{

		function GetClientID()

		{

			$CI=&get_instance();
			$data = $CI->db->query("select client_name as ClientID from mst_client");

			return $data->first_row()->ClientID;

		}

	} //if ( ! function_exists('GetInfo') )

	//isPTUApproval

	if ( ! function_exists('isPTUApproval') )

	{

		function isPTUApproval($tipe)

		{
			$CI=&get_instance();

			$IDUser = $_SESSION['IDUser'];

			$strWhere = " ".$tipe." = 1";

			$data = $CI->db->query("select id_user from sys_approval_modul where id_user = '".$IDUser."' and  ".$strWhere);

			$isHaveApprovalAccess = ($data->num_rows () > 0);

			return $isHaveApprovalAccess;

		}

	} //if ( ! function_exists('isPTUApproval') )


	//getTreeViewData

	if ( ! function_exists('getTreeViewData') )

	{



		function getTreeViewData($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $whereList = '')

		{



			$_SESSION['treeViewData'] = '';

			$strJsonData = '[';

			recursiveTreeView($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $whereList);

			$treeViewData = $_SESSION['treeViewData'];

			$treeViewData = substr($treeViewData, 0, strlen($treeViewData) - 1);

			$strJsonData .= $treeViewData;

			$strJsonData .=']';



			return $strJsonData;

		}

    }	//if ( ! function_exists('getTreeViewData') )




    //SanitizeParanoid

	if ( ! function_exists('SanitizeParanoid') )

	{



		function SanitizeParanoid($data)

		{



			$CI = &get_instance();

			$CI->security->xss_clean($data);

			$data = str_replace("'", "`", $data);

			$data = sanitize_sql_string($data);

			return $data;

		}

    }	//if ( ! function_exists('SanitizeParanoid') )



	//recursiveTreeView

	if ( ! function_exists('recursiveTreeView') )

	{

		function recursiveTreeView($induk = '', $fieldList = '', $dataList = '', $actionList = '', $tableName = '', $fieldID = '', $fieldCode = '', $fieldName = '', $whereList = '')

		    {



		    	$CI=&get_instance();


		    	$strActive = isDeveloperGroup() ? '' : ' aktif = 1 and ';

		     	$treeData = $CI->db->query("select ".$fieldList." from ".$tableName." where ".$strActive." and induk = '".$induk."' ".$whereList);



		    	if ( ($treeData->num_rows() ) > 0 )

		    	{



			        foreach($treeData->result_array() as $row)

			        {



			          	$strShowCode = ($fieldCode <> '') && ($tableName <> 'sys_modul') ? $row[$fieldCode].' - ' : '';



			          	$strDataList = '{';



			          	foreach ($dataList as $value) {

			          		$strDataList.= '\"'. $value .'\" : \"'. $row[$value] .'\",';

			          	}



			          	$strDataList = substr($strDataList, 0, strlen($strDataList) - 1 );



			          	$strDataList.='}';



			          	$strJsonText = '{"id":'.$row[$fieldID].',"dataList" : "'.$strDataList.'", "action" : "'.$actionList.'", "name":"'.$strShowCode.$row[$fieldName];

			        	$strJsonText.= $row['Header'] ? '", "children":[' : '"},';



			        	$_SESSION['treeViewData'].= $strJsonText;



			        	recursiveTreeView($row[$fieldCode],  $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $whereList);



	     				$strJsonText2 = $row['Header'] ? ']},' : '';

			          	$_SESSION['treeViewData'] = $row['Header'] ?  substr($_SESSION['treeViewData'], 0 ,strlen($_SESSION['treeViewData']) - 1) : $_SESSION['treeViewData'];



			          	$_SESSION['treeViewData'].= $strJsonText2;



			        } //foreach($treeData->result_array() as $row)



		      	} //if ( ($treeData->num_rows() ) > 0 )



		    }

	} //if ( ! function_exists('recursiveTreeView') )



	//getTreeGridMenu

	if ( ! function_exists('getTreeGridMenu') )

	{



		function getTreeGridMenu($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID = '0')

		{



			$_SESSION['treeViewData'] = '';

			$strJsonData = '[';

			recursiveTreeGridMenu($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID);

			$treeViewData = $_SESSION['treeViewData'];

			$treeViewData = substr($treeViewData, 0, strlen($treeViewData) - 1);

			$strJsonData .= $treeViewData;

			$strJsonData .=']';

			return $strJsonData;

		}

    } //if ( ! function_exists('getTreeGridMenu') )

    //isDeveloperGroup

	if ( ! function_exists('isDeveloperGroup') )
	{

		function isDeveloperGroup()
		{
			$CI=&get_instance();

	    	$IDUser = $_SESSION['IDUser'];

	    	//khusus untuk group superadmin/dev semua menu ditampilkan
	    	$data = $CI->db->query("select id_group as IDGroup from sys_user where id_user = '".$IDUser."'  ");
	    	$IDGroup = $data->first_row()->IDGroup;

	    	return $IDGroup == 1;
		}
	} //if ( ! function_exists('isDeveloperGroup') )


	//recursiveTreeView
	if ( ! function_exists('recursiveTreeGridMenu') )

	{

		function recursiveTreeGridMenu($induk = '', $fieldList = '', $dataList = '', $actionList = '', $tableName = '', $fieldID = '', $fieldCode = '', $fieldName = '', $groupID = 0)

		    {

		    	$CI=&get_instance();

		    	//role menu :
		    	//group dev/superadmin mempunyai akses ke semua menu (menu terbuka semua baik aktif maupun tidak aktif)
		    	//group admin di bawah dev/superadmin mempunyai akses hanya di menu-menu yang diaktifkan saja

		    	$strActive = isDeveloperGroup() ? '' : ' aktif = 1 and ';

		     	$treeData = $CI->db->query("select ".$fieldList." from ".$tableName." where ".$strActive." induk = '".$induk."'");

		    	if ( ($treeData->num_rows() ) > 0 )

		    	{



			        foreach($treeData->result_array() as $row)

			        {



			          	$strShowCode = ($fieldCode <> '') && ($tableName <> 'sys_modul') ? $row[$fieldCode].' - ' : '';



			          	$strDataList = '{';



			          	foreach ($dataList as $value) {

			          		$strDataList.= '\"'. $value .'\" : \"'. $row[$value] .'\",';

			          	}



			          	$strDataList = substr($strDataList, 0, strlen($strDataList) - 1 );



			          	$strDataList.='}';



			          	$actionChildList = ($row['Header'] == 0) ? $actionList : '';



			          	$strText = '{"id":'.$row[$fieldID].',"dataList" : "'.$strDataList.'", "action" : "'.$actionChildList.'", "name":"'.$strShowCode.$row[$fieldName];



			        	$strText.= $row['Header'] ? '", "children":[' : '"},';



			        	$_SESSION['treeViewData'].= $strText;



			        	//rekursif

			        	recursiveTreeGridMenu($row[$fieldCode],  $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID);



	     				$strText2 = $row['Header'] ? ']},' : '';

			          	$_SESSION['treeViewData'] = $row['Header'] ?  substr($_SESSION['treeViewData'], 0 ,strlen($_SESSION['treeViewData']) - 1) : $_SESSION['treeViewData'];



			          	$_SESSION['treeViewData'].= $strText2;



			        } //foreach($treeData->result_array() as $row)



		      	} //if ( ($treeData->num_rows() ) > 0 )



		    }

	} //if ( ! function_exists('recursiveTreeGridMenu') )


	//getTreeMenuData

	if ( ! function_exists('getTreeMenuData') )

	{



		function getTreeMenuData($induk, $tableName, $fieldID, $fieldCode, $fieldName, $childMenu)

		{



			$_SESSION['treeMenuData'] = '';

			//$strMenuData = '<li class="treeview active">';

			$strMenuData = '';

			recursiveTreeMenu($induk, $tableName, $fieldID, $fieldCode, $fieldName, $childMenu);

			$strMenuData .= $_SESSION['treeMenuData'];

			return $strMenuData;

		}

    }	//if ( ! function_exists('getTreeMenuData') )



    //GetSaldoAwal

	if ( ! function_exists('GetSaldoAwal') )

	{

		function GetSaldoAwal($IDAkun)

	  	{



	  		$CI=& get_instance();



	  		$IDUnitKerja 	= $_SESSION['IDUnitKerja'];

	  		$strValueUPTD   = GetSQLUPTDValue('select','value');



	  		$data = $CI->db->query("select debet_akhir as Debet, kredit_akhir as Kredit

	  								from trx_jurnal trxJurnal

	  								left join trx_jurnal_det trxJurnalDet

	  								on trxJurnal.id_jurnal = trxJurnalDet.id_jurnal

	  								where id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD."

	  								and id_sumber_trans = (select id_sumber_trans from ref_sumber_trans where kode = 'SA')

	  								and id_akun = '".$IDAkun."'");


	  		$debet  = ($data->num_rows() > 0 && $data->first_row()->Debet > 0) ? $data->first_row()->Debet : '0';
	  		$debet  = ($data->num_rows() > 0 && $data->first_row()->Kredit > 0) ? $data->first_row()->Kredit * -1 : $debet;

	  		$kredit = ($data->num_rows() > 0 && $data->first_row()->Kredit > 0) ? $data->first_row()->Kredit : '0';
	  		$kredit = ($data->num_rows() > 0 && $data->first_row()->Debet > 0) ? $data->first_row()->Debet * -1 : $kredit;


	  		$data = $CI->db->query("select concat(kode_induk,'.', kode_akun) as KodeAkun from mst_akun where id_akun  = '".$IDAkun."'  ");

	  		$KodeAkun = $data->first_row()->KodeAkun;

	  		$saldoAwal = (GetSaldoNormal($KodeAkun) == 'D') ? $debet : $kredit;


	  		return $saldoAwal;

	  	}

	} //if ( ! function_exists('GetSaldoAwal') )



	//GetSaldoNormal

	if ( ! function_exists('GetSaldoNormal') )

	{

		function GetSaldoNormal($KodeAkun)

	  	{

	  		$isFound = false;



	  		$CI=& get_instance();

	  		$KodeAkun = (strLen($KodeAkun) == 1) ? '0.'.$KodeAkun : $KodeAkun;

	  		$data = $CI->db->query("select saldo_normal as SaldoNormal from mst_akun where concat(kode_induk,'.', kode_akun) = '".$KodeAkun."'");



	  		$strSaldoNormal = ($data->num_rows() > 0)  ? $data->first_row()->SaldoNormal : '';



	  		return $strSaldoNormal;

	  	}

	}	//if ( ! function_exists('GetSaldoNormal') )



	//GetDebetKredit

	if ( ! function_exists('GetDebetKredit') )

	{

		function GetDebetKredit($KodeAkun, $Nominal, &$Debet, &$Kredit)

	  	{

	  		$SaldoNormal = GetSaldoNormal($KodeAkun);



	  		$Debet 	= ($SaldoNormal == 'D' && $Nominal >= 0) || ($SaldoNormal == 'K' && $Nominal < 0) ? abs($Nominal) : '0';

	  		$Kredit = ($SaldoNormal == 'D' && $Nominal < 0) || ($SaldoNormal == 'K' && $Nominal >= 0) ? abs($Nominal) : '0';

	  	}

	}	//if ( ! function_exists('GetDebetKredit') )

	//recursiveTreeMenu

	if ( ! function_exists('recursiveTreeMenu') )

	{

		function recursiveTreeMenu($induk, $tableName, $fieldID, $fieldCode, $fieldName, $childMenu = false)

		    {



		    	$CI=&get_instance();



		    	$strMaxLevel  = ($tableName == 'sys_modul') && (!$childMenu) ? ' and level_id<= 2 ' : '';


		    	$strActive = isDeveloperGroup() ? '' : ' aktif = 1 and ';

		     	$treeData = $CI->db->query("select * from ".$tableName." where ".$strActive." induk_menu = '".$induk."' ".$strMaxLevel."
		     								order by CAST(REPLACE(kode_modul,'.','') AS UNSIGNED) asc");



		    	if ( ($treeData->num_rows() ) > 0 )

		    	{



			        foreach($treeData->result_array() as $row)

			        {



			          	$strShowCode = ($fieldCode <> '') && ($tableName <> 'sys_modul') &&  ($tableName <> 'ref_output_rba_menu') ? $row[$fieldCode].' - ' : '';



			          	$urlLink = $row['header'] ? '#' : $row['link_modul'];



			          	//$headerIcon = ($row['header'])  ? 'fa fa-suitcase' : 'fa fa-chevron-circle-right';



			          	$headerIcon 	= '';//($row['modul_report'])  ? "<i class='glyphicon glyphicon-file'></i>" : "<i class='glyphicon glyphicon-circle-arrow-right'></i>";



			          	$ajaxClass  	= ($row['header']) ?  '' : 'class="sidebarMenu"';



		      			$parentIDX 		= ($row['header'] && $tableName == 'sys_modul') ? $row['id_modul'] : '';

		      			$strLinkMenu 	=  (!$childMenu) ? 'linkMenu' : 'linkSubMenu' ;

		      			$strRole 		= ($row['header']) ? 'linkMenuChild' : $strLinkMenu;



		        		if ($tableName == 'sys_modul')

		        		{

		        			$HakAksesMenu = $CI->db->query("SELECT id_group FROM sys_group_modul

		        											WHERE id_group = (SELECT id_group

		        											FROM sys_user WHERE id_user='".$_SESSION['IDUser']."' )

		        											and id_modul = 	'".$row['id_modul']."'");



		        			$isHaveAccess = ($HakAksesMenu->num_rows() > 0);

		        		}

		        		else

		        		{

		        			$isHaveAccess = true;

		        		}



		          		//$strText = ($isHaveAccess) ? '<li><a '.$ajaxClass.' href="'.$urlLink.'"><i class="'.$headerIcon.'"></i>'.$strShowCode.$row[$fieldName].'</a></li>' : '';

		          		$strText = ($isHaveAccess) ? '<a role="'.$strRole.'" idx= "'.$parentIDX.'" title="'.$row['deskripsi'].'" class="btn btn-sm btn-default" href="'.$urlLink.'" style="margin-right:5px;margin-bottom:5px;font-size:11px;">'.$headerIcon.'&nbsp;'.$row[$fieldName].'</a>' : '';





			          	if ($row['header']){



			          		//$strText .= "<ul class='treeview-menu menu-open' style='display: block;'>";

			          		$strText .= '';//"<ul class='nav navbar-nav'>";



			          		if ($tableName == 'sys_modul')

		        			{
		        				$strActive = isDeveloperGroup() ? '' : ' aktif = 1 and ';

				          		$HakAksesMenu = $CI->db->query("SELECT id_modul FROM sys_group_modul sysUserModul

																WHERE id_group = (SELECT id_group

		        												FROM sys_user WHERE id_user='".$_SESSION['IDUser']."' )

																AND id_modul IN (SELECT id_modul FROM sys_modul

																WHERE ".$strActive." induk_menu = '".$row['id_modul']."') LIMIT 1");





				          		$isHaveAccess = ($HakAksesMenu->num_rows() > 0);

			          		}

			          		else

			          		{

			          			$isHaveAccess = true;

			          		}



			          		$strText = ($isHaveAccess) ? $strText : '';



			          	}

			          	else{

			          		//$strText .=  '</li>';

			          		$strText .=  '';

			          	}



			        	$_SESSION['treeMenuData'].= $strText;

			        	recursiveTreeMenu($row[$fieldCode],  $tableName, $fieldID, $fieldCode, $fieldName, $childMenu);



	     				//$strText2 = $row['header'] ? '</li></ul>' : '';

	     				$strText2 = '';



			          	$_SESSION['treeMenuData'].= $strText2;



			        } //foreach($treeData->result_array() as $row)



		      	} //if ( ($treeData->num_rows() ) > 0 )



		    }   //function recursiveTreeMenu($induk, $tableName, $fieldID, $fieldCode, $fieldName, $childMenu = false)

	} //if ( ! function_exists('recursiveTreeMenu') )



	    //GetInstansi

		if ( ! function_exists('GetInstansi') )

		{

			function GetInstansi() //khusus untuk info instansi di banner

	    	{

	    		$strNamaUPTD   = GetSettingValue('prefix_uptd').' '.$_SESSION['NamaUPTD'];

				$strNamaDinas  = $_SESSION['NamaUnitKerja'];

				$strTipeLogin  = $_SESSION['TipeLogin'];



				$strNamaInstansi =  ($strTipeLogin == 'Dinas') ? $strNamaDinas :  $strNamaUPTD;

				return $strNamaInstansi;

	    	}

	    }	//if ( ! function_exists('GetInstansi') )



	    //GetKelompokIndustriDenganUPTD

		if ( ! function_exists('GetKelompokIndustriDenganUPTD') )

		{

			function GetKelompokIndustriDenganUPTD() //khusus untuk info instansi di banner

	    	{

	    		$arrKelompokIndustri = array("Puskesmas", "Dana Bergulir", "Rumah Sakit", "Universitas", "Desa");

				return $arrKelompokIndustri;

	    	}

	    } //if ( ! function_exists('GetKelompokIndustriDenganUPTD') )



		//GetNamaInstansi

		if ( ! function_exists('GetNamaInstansi') )

		{

			function GetNamaInstansi()

	    	{



				$strNamaUPTD   = GetSettingValue('prefix_uptd').' '.$_SESSION['NamaUPTD'];

				$strNamaDinas  = $_SESSION['NamaUnitKerja'];

				$strTipeLogin  = $_SESSION['TipeLogin'];



				$namaIndustri =  GetSettingValue('kelompok_industri');



                $isAdaUPTD = in_array($namaIndustri, GetKelompokIndustriDenganUPTD());



   				$strNamaInstansi =  ($strTipeLogin == 'Dinas') ? '' :  $strNamaUPTD;



   				$_SESSION['DaftarUPTD'] = array();



   				if ($strTipeLogin == 'Dinas')

   				{

   					$CI=& get_instance();



   					$selectQuery = $CI->db->query("SELECT id_unit_kerja AS IDUnitKerja, kode_unit_kerja AS KodeUnitKerja,

   												   nama_unit_kerja AS NamaUnitKerja

												   FROM mst_unit_kerja

												   ORDER BY KodeUnitKerja ASC");

   					$arrSelectQuery = $selectQuery->result_array();



   					$_SESSION['DaftarUPTD'][] = array("IDUPTD" => $selectQuery->first_row()->IDUnitKerja,

   													  "KodeUPTD" => $selectQuery->first_row()->KodeUnitKerja,

   													  "NamaUPTD" => $selectQuery->first_row()->NamaUnitKerja,

   													  "Tipe" => "Dinas");



   					if ($isAdaUPTD)

   					{

       					$selectQuery = $CI->db->query("SELECT id_uptd as IDUPTD, kode_uptd as KodeUPTD, nama_uptd as NamaUPTD

				       									FROM mst_uptd

				       									ORDER BY KodeUPTD ASC");



       					$arrSelectQuery = $selectQuery->result_array();



       					foreach ($arrSelectQuery as $row) {

       						$_SESSION['DaftarUPTD'][] = array("IDUPTD" 		=> $row['IDUPTD'],

       														  "KodeUPTD" 	=> $row['KodeUPTD'],

       														  "NamaUPTD"	=> $row['NamaUPTD'],

       														  "Tipe" => "UPTD");

       					}

       				}



   				}

   				else

   				{

   					unset($_SESSION['DaftarUPTD']);

   				}



   				return $strNamaInstansi;

   			}

		}		//if ( ! function_exists('GetNamaInstansi') )



		//GetLogoInstansi

		if ( ! function_exists('GetLogoInstansi') )

		{

			function GetLogoInstansi($base64 = false)

	    	{



				$logoDinas 		= GetSettingValue('file_logo_dinas');

				$logoPuskesmas  = GetSettingValue('file_logo_puskesmas');



   				$logoFile =  ($_SESSION['TipeLogin'] == 'Dinas') ? $logoDinas :  $logoPuskesmas;



   				return $logoFile;

   			}

		}	//if ( ! function_exists('GetLogoInstansi') )



		//writeCRUDLog

		if ( ! function_exists('writeCRUDLog') )

		{

			function writeCRUDLog($content = '', $module = 'default', $action = 'default')

		  	{



		  		$serverDate = mktime(date("G"), date("i"), date("s"), date("n"), date("j"), date("Y"));

				$diffGMT = substr(date("O", $serverDate), 1, 2);

				$dateDiffGMT = 60 * 60 * $diffGMT;



				if (substr(date("O", $dateDiffGMT), 0, 1) == '+')

					$GMTDate = $serverDate - $dateDiffGMT;

				else

					$GMTDate = $serverDate + $dateDiffGMT;



				$DateDiffIndonesian = 60 * 60 * 7;



				$newDate = date('Y-m-d H:i:s', $GMTDate + $DateDiffIndonesian);



				$currentYear 	= date('Y', $GMTDate + $DateDiffIndonesian);

				$currentMonth 	= date('m', $GMTDate + $DateDiffIndonesian);

				$currendDate 	= date('d-m-Y', $GMTDate + $DateDiffIndonesian);



				$logDir		= APPPATH.'logs/';

				$CRUDLogDir = $logDir.'CRUDLog/';

				$yearDir 	= $CRUDLogDir.$currentYear.'/';

				$monthDir 	= $yearDir.$currentMonth.'/';

				$fileName 	= $monthDir.$currendDate;



				@mkdir($CRUDLogDir, 0777);

		  		@mkdir($yearDir, 0777);

		  		@mkdir($monthDir, 0777);



		  		$currendDateTime = date('d-m-Y H:i:s', $GMTDate + $DateDiffIndonesian);



				$fp = @fopen($fileName, 'ab');

				@fwrite($fp, $currendDateTime . " [ ".$module." - ".$action." - ".$_SESSION['IDUser']."#".$_SESSION['NamaUser']."#".$_SESSION['NamaLengkap']." ] : ".$content. " \n");

				@fclose($fp);

		  	}

		}  	//if ( ! function_exists('writeCRUDLog') )



		//writeTransLog

		if ( ! function_exists('writeTransLog') )

		{

			function writeTransLog($content = '', $module = 'default', $action = 'default')

		  	{



		  		$serverDate = mktime(date("G"), date("i"), date("s"), date("n"), date("j"), date("Y"));

				$diffGMT = substr(date("O", $serverDate), 1, 2);

				$dateDiffGMT = 60 * 60 * $diffGMT;



				if (substr(date("O", $dateDiffGMT), 0, 1) == '+')

					$GMTDate = $serverDate - $dateDiffGMT;

				else

					$GMTDate = $serverDate + $dateDiffGMT;



				$DateDiffIndonesian = 60 * 60 * 7;



				$newDate = date('Y-m-d H:i:s', $GMTDate + $DateDiffIndonesian);



				$currentYear 	= date('Y', $GMTDate + $DateDiffIndonesian);

				$currentMonth 	= date('m', $GMTDate + $DateDiffIndonesian);

				$currendDate 	= date('d-m-Y', $GMTDate + $DateDiffIndonesian);



				$logDir		= APPPATH.'logs/';

				$CRUDLogDir = $logDir.'transLog/';

				$yearDir 	= $CRUDLogDir.$currentYear.'/';

				$monthDir 	= $yearDir.$currentMonth.'/';

				$fileName 	= $monthDir.$currendDate;



				@mkdir($CRUDLogDir, 0777);

		  		@mkdir($yearDir, 0777);

		  		@mkdir($monthDir, 0777);



		  		$currendDateTime = date('d-m-Y H:i:s', $GMTDate + $DateDiffIndonesian);



				$fp = @fopen($fileName, 'ab');


				$instansi = ($_SESSION['TipeLogin'] == 'Dinas') ?  $_SESSION['KodeUnitKerja']."-".$_SESSION['NamaUnitKerja'] : $_SESSION['KodeUPTD']."-".$_SESSION['NamaUPTD'];

				@fwrite($fp, $currendDateTime . " [ ".$module." - ".$action." - ".$instansi."#".$_SESSION['IDUser']."#".$_SESSION['NamaUser']."#".$_SESSION['NamaLengkap']." ] : \r\n ".$content. " \r\n");

				@fclose($fp);

		  	}

		}  	//if ( ! function_exists('writeTransLog') )





		//GetSettingValue($settingName)

		if ( ! function_exists('GetSettingValue') )

		{

			function GetSettingValue($settingName)

		  	{

		  		$arrHeaderReport    = GetHeaderReport();

				$wilayahDaerah      = $arrHeaderReport['WilayahDaerah'];

				$jenisWilayahDaerah = $arrHeaderReport['JenisWilayahDaerah'];



		  		$CI=& get_instance();

		  		$result = $CI->db->query("select set_setting_value as SettingValue from set_setting where set_setting_nama = '".$settingName."' ");



		  		$settingValue = ($result->num_rows() > 0) ?  $result->first_row()->SettingValue : '';

		  		$settingValue = ($settingName == 'judul_nama_pemda') ? $settingValue.' '.$jenisWilayahDaerah.' '.$wilayahDaerah : $settingValue;

		  		return $settingValue;

		  	}

		}  	//if ( ! function_exists('GetSettingValue') )


		//GetPrinterSettingValue($settingName)

		if ( ! function_exists('GetPrinterSettingValue') )

		{

			function GetPrinterSettingValue($modul)

		  	{



				$IDUnitKerja  = $_SESSION['IDUnitKerja'];
        		$strValueUPTD = GetSQLUPTDValue('select','value');


		  		$CI=& get_instance();

		  		$result = $CI->db->query("select * from sys_setting_printer where modul = '".$modul."'
		  								 and id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD." ");


		  		return ($result->num_rows() > 0) ? $result->result_array() : array();

		  	}

		}  	//if ( ! function_exists('GetPrinterSettingValue') )


		//isCheckTransactionOK

		if ( ! function_exists('isCheckTransactionOK') )

		{

			function isCheckTransactionOK($arrData)

		  	{

		  		$isFound = false;



		  		$CI=& get_instance();



		  		foreach ($arrData as $row) {

			  		$selectQuery = $CI->db->query("select * from ".$row['tableName']." where ".$row['SQLWhere']. " limit 1 ");



			  		if ($selectQuery->num_rows() > 0)

			  		{

			  			$isFound = true;

			  			break;

			  		}

		  		}



		  		return !$isFound;

		  	}

		}	//if ( ! function_exists('isCheckTransactionOK') )



		//formatCurrency($value)

		if ( ! function_exists('formatCurrency') )

		{

			function formatCurrency($value, $decimalAmount = 0, $thousandSeparator = 0, $decimalSeparator = 0)

		  	{

		  		$decimalAmount 		= ($decimalAmount == 0) ? 0 : $decimalAmount;

		  		$decimalSeparator 	= ($decimalSeparator == 0) ? '.' : $decimalSeparator;

		  		$thousandSeparator  = ($thousandSeparator == 0) ? ',' : $thousandSeparator;



		  		$strCurrency = ($value >= 0) ? number_format($value, $decimalAmount, $decimalSeparator, $thousandSeparator) : "(".number_format(abs($value), $decimalAmount, $decimalSeparator, $thousandSeparator).")";

		  		return $strCurrency;

		  	}

		}  	//if ( ! function_exists('formatCurrency') )



		//GetAutoNum($value)

		if ( ! function_exists('GetAutoNum') )

		{

			function GetAutoNum($tipe = 'JU', $jenis = '')

		  	{

		  		$tipe  = strtolower($tipe);

		  		$tipe2 = strtolower($tipe);

		  		$jenis2 = $jenis;


		  		$tableName = 'trx_'.$tipe;

		  		$CI = &get_instance();



		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

		  		$strValueUPTD   = GetSQLUPTDValue('select','value');


		  		$strWhereKode = ($jenis == 'UM' || $jenis =='UMP') ? " kode in ('UM','UMP') " : " kode = '".$jenis."'  ";
		  		$strWhereKode = ($jenis =='UK' || $jenis =='UKP') ? " kode in ('UK','UKP') " : $strWhereKode;
		  		$strWhereKode = ($jenis =='TAX') ? " kode in ('TAX') " : $strWhereKode;

		  		$jenis = ($jenis == 'LS' || $jenis == 'LSH' || $jenis == 'UP') ? "" : $jenis;

		  		$strJenis = ($jenis <> '') ? " and id_sumber_trans in   (select id_sumber_trans from ref_sumber_trans where ".$strWhereKode." ) " : "";

		  		$strJenis = ($jenis2 == 'LS' || $jenis2 == 'LSH' || $jenis2 == 'UP' ) ? " and tipe_$tipe = '$jenis2'" : $strJenis;
		  		$strJenis = ($jenis2 == 'UK') ? " and tipe_bkk = 'LS'" : $strJenis;

		  		$selectQuery = $CI->db->query("select nomor as trxNumber from ".$tableName."

									  			where id_unit_kerja = '".$IDUnitKerja."' AND ".$strValueUPTD."  ".$strJenis."

									  			order by id_".$tipe." desc limit 1");

		  		$tipe = strtoupper($tipe);

		  		$tipe = ($jenis == '') ? $tipe : strtoupper($jenis);

		  		$strZeroLength = 5;

		  		$jenis2 = ($jenis2 == 'UP') ? "UP" :  $jenis2;
		  		$jenis2 = ($jenis2 == 'LSH') ? "LSH" : $jenis2;
		  		$jenis2 = ($jenis2 == 'UK') ? "LS" : $jenis2;


		  		$tipe 	= ($tipe == 'UK') ? "BKK" : $tipe;

		  		$strFirstNumber =  $tipe.strtoupper($jenis2).str_pad("0", $strZeroLength, "0", STR_PAD_LEFT);

		  		$arrResult 	= ($selectQuery->num_rows() > 0) ? $selectQuery->row_array() : array("trxNumber" => $tipe.strtoupper($jenis2).'00001');

		  		$lastNumber = ($selectQuery->num_rows() > 0) ?  $selectQuery->first_row()->trxNumber : $strFirstNumber;

		  		//check nomor yang lebih dari nomor sekarang (untuk menghindari deadlock number)

		  		$selectQuery = $CI->db->query("select nomor as trxNumber from ".$tableName."

									  			where id_unit_kerja = '".$IDUnitKerja."' AND ".$strValueUPTD."  ".$strJenis."

									  			and nomor > '".$lastNumber."'

									  			AND nomor LIKE '".GetLeftExcludeAutoNumber($lastNumber)."%'

									  			order by nomor desc limit 1");



		  		if ($selectQuery->num_rows() > 0)

		  		{

		  			//replace nomor terakhir dengan nomor maksimalnya

		  			$lastNumber = 	$selectQuery->first_row()->trxNumber;

		  		}



		  		return $lastNumber;
		  	}

		}  	//if ( ! function_exists('GetAutoNum') )



		//isAutoNumberFound

		if ( ! function_exists('isAutoNumberFound') )

		{

			function isAutoNumberFound($nomor, $tipe = 'JU', $jenis = '', $FieldIDtrxEdit = '', $IDTrxEdit = '')

		  	{



		  		$CI = & get_instance();



		  		$tipe  = strtolower($tipe);

		  		$tableName = 'trx_'.$tipe;



		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

		  		$strValueUPTD   = GetSQLUPTDValue('select','value');


		  		$strWhereJenis = ($jenis == 'UM') ? " kode in ('".$jenis."', 'UMP') " : " kode = '".$jenis."' ";
		  		$strWhereJenis = ($jenis == 'UK') ? " kode in ('".$jenis."', 'UKP') " : " kode = '".$jenis."' ";

		  		$strJenis = ($jenis <> '') ? " and id_sumber_trans in  (select id_sumber_trans from ref_sumber_trans where ".$strWhereJenis." ) " : "";



		  		//handle untuk transaksi yang di edit

		  		//tambahkan idnya

		  		$strTrxEdit = ($IDTrxEdit <> '') ? " and ".$FieldIDtrxEdit." <> '".$IDTrxEdit."'  " : "";



			  	$selectQuery = $CI->db->query("select nomor as trxNumber from ".$tableName."

									  		   where id_unit_kerja = '".$IDUnitKerja."' AND ".$strValueUPTD."  ".$strJenis."

									  		   and nomor = '".$nomor."' ".$strTrxEdit);

		  		return $selectQuery->num_rows() > 0;



		  	}

		}	//if ( ! function_exists('isAutoNumberFound') )



		//GetClientName

		if ( ! function_exists('GetClientName') )

		{

			function GetCLientName()
		  	{
		  		$CI = & get_instance();

		  		$selectQuery = $CI->db->query("select client_name as ClientName from mst_client");

		  		$clientName  = $selectQuery->first_row()->ClientName;

		  		return $clientName;
		  	}
		}


		//GetSQLUPTDValue

		if ( ! function_exists('GetSQLUPTDValue') )

		{

			function GetSQLUPTDValue($DML= '', $type = '')

		  	{



		  	    $IDUPTD = $_SESSION['IDUPTD'];



		  	    $strValue =  ($DML == 'insert')  ? (($_SESSION['IDUPTD'] > 0 ) ? ',id_uptd' : '')  : ',id_uptd';



		  		if ($type == 'value')

		  		{



		  			if ($DML == 'select')

		  			{

		  				$strValue = 'id_uptd ';

		  				$strValue .= $_SESSION['IDUPTD'] > 0 ? "='".$IDUPTD."'" : "IS NULL";

		  			}



		  			if ($DML == 'insert')

		  			{

		  				$strValue = $IDUPTD > 0 ? ",'".$IDUPTD."'" : "";

		  			}



		  		}



		  		return $strValue;

		  	}

		}  	//if ( ! function_exists('GetSQLUPTDValue') )



		//GetSQLConvert

		if ( ! function_exists('GetSQLConvert') )

		{

			function GetSQLConvert($strData)

		  	{



		  	    $IDUPTD = $_SESSION['IDUPTD'];



		  	    $strData = trim($strData);



		  	    if ($IDUPTD == -1)

		  	    {

		  	    	if ($strData == "=")

		  	    		$strData = ' in ';

		  	    	else if ($strData == 'distinct')

		  	    		$strData = ' distinct ';

		  	    	else

		  	    		$strData = '';

		  	    }



		  		return $strData;

		  	}

		}  	//if ( ! function_exists('GetSQLConvert') )



		//GetTahunPeriode

		if ( ! function_exists('GetTahunPeriode') )

		{

			function GetTahunPeriode()

		  	{

		  		$CI=&get_instance();

		  		$data = $CI->db->query("select tahun_periode_akuntansi as TahunPeriode from ref_periode_akuntansi");

		  		return $data->first_row()->TahunPeriode;

		  	}

		} //if ( ! function_exists('GetTahunPeriode') )

		//GetLastDateInMonth
		if ( ! function_exists('GetLastDateInMonth') )
		{
			function GetLastDateInMonth($month, $year = '')
			{
				$year = ($year <> '') ? $year : RealDateTime ("Year");
				$newDate = mktime (0,0,0, $month, '01' , RealDateTime ("Year"));

	            return date('t', $newDate);

			}
		} //if ( ! function_exists('GetLastDateInMonth') )

		//GetModulPrivillige

		if ( ! function_exists('GetModulPrivillige') )

		{

			function GetModulPrivillige($modul)

		  	{

		  		$CI=&get_instance();

		  		//untuk group dev/superadmin semua menu ditampilkan
		  		$strActive 		= isDeveloperGroup() ? '' : ' aktif = 1 and ';
		  		$strUserGroup   = isDeveloperGroup() ? '' : " id_group = (SELECT id_group FROM sys_user WHERE id_user='".$_SESSION['IDUser']."') AND ";

		  		$data = $CI->db->query("SELECT id_group FROM sys_group_modul
		  								WHERE ".$strUserGroup."
										id_modul = 	(SELECT id_modul FROM sys_modul WHERE ".$strActive." nama_modul = '".$modul."')");

		  		return $data->num_rows() > 0;



		  	}

		}  	//if ( ! function_exists('GetModulPrivillige') )



		//GetLockRKA

		if ( ! function_exists('GetLockRKA') )

		{

			function GetLockRKA()

		  	{

		  		$CI=&get_instance();

		  		$data = $CI->db->query("SELECT  kunci AS Kunci FROM trx_anggaran_biaya_rka ORDER BY id_anggaran_biaya_rka DESC LIMIT 1");

		  		return $data->first_row()->Kunci > 0;



		  	}

		}  	//if ( ! function_exists('GetLockRKA') )



		//GetLockRBA

		if ( ! function_exists('GetLockRBA') )

		{

			function GetLockRBA()

		  	{
		  		$jenisIndustri = GetSettingValue('kelompok_industri');

		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

     			$strValueUPTD   = GetSQLUPTDValue('select','value');

     			$strValueUPTD   = ($jenisIndustri == 'Puskesmas') ? " id_uptd  = (select id_uptd from mst_uptd limit 1) " : $strValueUPTD;


		  		$CI=&get_instance();

		  		$data = $CI->db->query("SELECT  kunci AS Kunci FROM ".GetTabelRBA('biaya')."

		  								where id_unit_kerja ='".$IDUnitKerja."' and ".$strValueUPTD."

		  								AND revisi = (SELECT MAX(revisi) FROM ".GetTabelRBA('biaya')."

										WHERE id_unit_kerja ='".$IDUnitKerja."' and ".$strValueUPTD.") LIMIT 1");

		  		return ($data->num_rows() > 0)  ? $data->first_row()->Kunci > 0 : false;



		  	}

		}  	//if ( ! function_exists('GetLockRBA') )



		//GetPengesahanPerubahanRKA

		if ( ! function_exists('GetPengesahanPerubahanRKA') )

		{

			function GetPengesahanPerubahanRKA()

		  	{

		  		$CI=&get_instance();

		  		$data = $CI->db->query("SELECT pengesahan AS Kunci FROM trx_anggaran_biaya_rka

		  								where kunci = 1 and pengesahan = 1

		  								ORDER BY id_anggaran_biaya_rka

		  								DESC LIMIT 1");

		  		return $data->num_rows() > 0;



		  	}

		}  	//if ( ! function_exists('GetPengesahanPerubahanRKA') )



		//GetPengesahanPerubahanRBA

		if ( ! function_exists('GetPengesahanPerubahanRBA') )

		{

			function GetPengesahanPerubahanRBA()

		  	{

		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

     			$strValueUPTD   = GetSQLUPTDValue('select','value');



		  		$CI=&get_instance();

		  		$data = $CI->db->query("SELECT pengesahan AS Kunci FROM ".GetTabelRBA('biaya')."

		  								where kunci = 1 and pengesahan = 1

		  								and id_unit_kerja ='".$IDUnitKerja."' and ".$strValueUPTD."

		  								ORDER BY id_anggaran_biaya DESC LIMIT 1");

		  		return $data->num_rows() > 0;



		  	}

		}  	//if ( ! function_exists('GetPengesahanPerubahanRBA') )



		//GetPerubahanRKA

		if ( ! function_exists('GetPerubahanRKA') )

		{

			function GetPerubahanRKA()

		  	{

		  		$strValueUPTD   = GetSQLUPTDValue('select','value');



		  		$CI=&get_instance();

		        $selectQuery = $CI->db->query("SELECT pengesahan  AS Pengesahan

		                                     FROM trx_anggaran_biaya_rka

		                                     WHERE id_unit_kerja = '".$_SESSION['IDUnitKerja']."' and ".$strValueUPTD." AND revisi=1 ");



		        return ($selectQuery->num_rows() > 0) ? $selectQuery->first_row()->Pengesahan == 0 ? ' RKA - Perubahan' : ' RKA - Perubahan (Terkunci)' : '';

		    }

		}  //if ( ! function_exists('GetPerubahanRKA') )


		//GetLockRBAP

		if ( ! function_exists('GetLockRBAP') )

		{

			function GetLockRBAP()

		  	{
		  		$jenisIndustri = GetSettingValue('kelompok_industri');

		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

     			$strValueUPTD   = GetSQLUPTDValue('select','value');

     			$strValueUPTD   = ($jenisIndustri == 'Puskesmas') ? " id_uptd  = (select id_uptd from mst_uptd limit 1) " : $strValueUPTD;

     			$revisi = GetRevisiRBA();

		  		$CI=&get_instance();

		        $selectQuery = $CI->db->query("SELECT pengesahan  AS Pengesahan

		                                     FROM ".GetTabelRBA('biaya')."

		                                     WHERE id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD." AND revisi='$revisi' and kunci = 1");


		        return ($selectQuery->num_rows() > 0) ;



		    }

		} //if ( ! function_exists('GetPerubahanRBA') )


		//IsLockRBAP

		if ( ! function_exists('IsLockRBAP') )

		{

			function IsLockRBAP()

		  	{
		  		$jenisIndustri = GetSettingValue('kelompok_industri');

		  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

     			$strValueUPTD   = GetSQLUPTDValue('select','value');

     			$strValueUPTD   = ($jenisIndustri == 'Puskesmas') ? " id_uptd  = (select id_uptd from mst_uptd limit 1) " : $strValueUPTD;

     			$revisi = GetRevisiRBA();

		  		$CI=&get_instance();

		        $selectQuery = $CI->db->query("SELECT pengesahan  AS Pengesahan

		                                     FROM ".GetTabelRBA('biaya')."

		                                     WHERE id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD." AND revisi='$revisi'
		                                     and kunci = 1
		                                     and pengesahan = 1");


		        return ($selectQuery->num_rows() > 0) ;



		    }

		} //if ( ! function_exists('IsLockRBAP') )



		//GetHeaderReport

		if ( ! function_exists('GetHeaderReport') )

		{

			function GetHeaderReport($withCode = true)

		  	{



		  		$CI=&get_instance();

		  		$strValueUPTD   = GetSQLUPTDValue('select','value');



		  		if ($withCode)

		  		{

		        	$selectQuery = $CI->db->query("SELECT (SELECT CONCAT(kode_urusan_pemerintahan,' ', nama_urusan_pemerintahan)

													FROM ref_urusan_pemerintahan) AS UrusanPemerintahan, (SELECT CONCAT(kode_unit_kerja,' ', nama_unit_kerja)

													FROM mst_unit_kerja) AS Organisasi, (SELECT wilayah_daerah FROM ref_pemerintahan_daerah) AS WilayahDaerah,

		        									(SELECT jenis_wilayah_daerah FROM ref_pemerintahan_daerah) AS JenisWilayahDaerah,

		        									(SELECT nama_pimpinan FROM mst_unit_kerja) AS NamaKepalaDinas,

		     										(SELECT nip FROM mst_unit_kerja) AS NIPKepalaDinas,

		     										(SELECT alamat FROM mst_unit_kerja) AS AlamatDinas,

		        									(SELECT nama_pejabat_pengelola_keuangan_daerah FROM ref_pemerintahan_daerah) AS NamaPPKD,

		        									(SELECT nip_pejabat_pengelola_keuangan_daerah FROM ref_pemerintahan_daerah) AS NIPPPKD,

		        									(SELECT jenis_kepala_daerah FROM ref_pemerintahan_daerah) AS JenisKepalaDaerah,

		        									(SELECT nama_kepala_daerah FROM ref_pemerintahan_daerah) AS NamaKepalaDaerah,

		        									(SELECT nama_uptd FROM mst_uptd WHERE ".$strValueUPTD.") AS NamaUPTD,

													(SELECT alamat FROM mst_uptd WHERE ".$strValueUPTD.") AS AlamatUPTD,

		        									(SELECT nip FROM mst_uptd WHERE ".$strValueUPTD.") AS NIPPimpinanBLUD,

		        									(SELECT nama_pimpinan from mst_uptd WHERE ".$strValueUPTD." ) as NamaPimpinanBLUD");

		    	}

		     	else

		     	{

		     		$selectQuery = $CI->db->query("SELECT (SELECT nama_urusan_pemerintahan

													FROM ref_urusan_pemerintahan) AS UrusanPemerintahan,

		     										(SELECT nama_unit_kerja

													FROM mst_unit_kerja) AS Organisasi,

		     										(SELECT wilayah_daerah FROM ref_pemerintahan_daerah) AS WilayahDaerah,

		     										(SELECT jenis_wilayah_daerah FROM ref_pemerintahan_daerah) AS JenisWilayahDaerah,

		     										(SELECT nama_pimpinan FROM mst_unit_kerja) AS NamaKepalaDinas,

		     										(SELECT nip FROM mst_unit_kerja) AS NIPKepalaDinas,

		     										(SELECT alamat FROM mst_unit_kerja) AS AlamatDinas,

		     										(SELECT nama_pejabat_pengelola_keuangan_daerah FROM ref_pemerintahan_daerah) AS NamaPPKD,

		        									(SELECT nip_pejabat_pengelola_keuangan_daerah FROM ref_pemerintahan_daerah) AS NIPPPKD,

		        									(SELECT jenis_kepala_daerah FROM ref_pemerintahan_daerah) AS JenisKepalaDaerah,

		        									(SELECT nama_kepala_daerah FROM ref_pemerintahan_daerah) AS NamaKepalaDaerah,

		        									(SELECT nama_uptd FROM mst_uptd WHERE ".$strValueUPTD.") AS NamaUPTD,

													(SELECT alamat FROM mst_uptd WHERE ".$strValueUPTD.") AS AlamatUPTD,

		        									(SELECT nip FROM mst_uptd WHERE ".$strValueUPTD.") AS NIPPimpinanBLUD,

		        									(SELECT nama_pimpinan from mst_uptd where ".$strValueUPTD." ) as NamaPimpinanBLUD");

				}



		        return $selectQuery->row_array();



		    }

		} //if ( ! function_exists('GetHeaderReport') )



		//GetMonthName

		if ( ! function_exists('GetMonthName') )

		{

			function GetMonthName($id)

			{

				$strName = '';



				if ($id == 1) $strName = 'Januari';

				if ($id == 2) $strName = 'Februari';

				if ($id == 3) $strName = 'Maret';

				if ($id == 4) $strName = 'April';

				if ($id == 5) $strName = 'Mei';

				if ($id == 6) $strName = 'Juni';

				if ($id == 7) $strName = 'Juli';

				if ($id == 8) $strName = 'Agustus';

				if ($id == 9) $strName = 'September';

				if ($id == 10) $strName = 'Oktober';

				if ($id == 11) $strName = 'Nopember';

				if ($id == 12) $strName = 'Desember';



				return $strName;

			}

		} //if ( ! function_exists('GetMonthName') )



		//IsDateRangeTransactionOK

		if ( ! function_exists('IsDateRangeTransactionOK') )

		{

			function IsDateRangeTransactionOK($tanggal)

			{

				$CI=&get_instance();



				$tanggal = formatDateDB($tanggal);



				$data = $CI->db->query("SELECT CASE WHEN (MONTH('".$tanggal."') >=

										(SELECT bulan_awal_periode_akuntansi FROM ref_periode_akuntansi) AND

										MONTH('".$tanggal."') <= (SELECT bulan_akhir_periode_akuntansi FROM ref_periode_akuntansi))

										AND year('".$tanggal."') = (SELECT tahun_periode_akuntansi FROM ref_periode_akuntansi) THEN 1

										ELSE 0 END AS InDateRange");



				return ($data->first_row()->InDateRange == 1);

			}

		}	//if ( ! function_exists('IsDateRangeTransactionOK') )



	//GetLeftExcludeAutoNumber

	if ( ! function_exists('GetLeftExcludeAutoNumber') )

	{

		function GetLeftExcludeAutoNumber($nomor = '')

		{



			$hasil 		= "";

			$Text 		= $nomor;

			$txt 		= trim($Text);

		    $strLen 	= strlen($txt);

		    $afterChar 	= true;



		    for ($i=0;$i<$strLen;$i++)

		    {



		        $karakter = substr($txt, $i, 1);



		        if  (is_numeric($karakter))

		        {



		            if  ($afterChar)

		            {



		                $idx = $i;



		                $hasil = $karakter;



		            }else

		            {



		                $hasil = $hasil.$karakter;



		            }



		            $afterChar = false;



		        }else

		        {

		            $afterChar = true;



		        } //if  (is_int($karakter))



		    } //for ($i=1;$i<$strLen;$i++)



	    	if ($hasil <> "")

	    	{

		        $akhiran = substr($txt, $idx + strlen($hasil), strlen($txt));



    			$hasil = substr($txt, 0, $idx).$akhiran;

			}

			else

			{

				$hasil = $Text;

			}//if ($hasil <> "")



        	return $hasil;



    	} //function GetNextNo($nomor)



	} //if ( ! function_exists('GetLeftExcludeAutoNumber') )



	//GetNextNo

	if ( ! function_exists('GetNextNo') )

	{

		function GetNextNo($nomor = '')

		{



			$hasil 		= "";

			$Text 		= $nomor;

			$txt 		= trim($Text);

		    $strLen 	= strlen($txt);

		    $afterChar 	= true;



		    for ($i=0;$i<$strLen;$i++)

		    {



		        $karakter = substr($txt, $i, 1);



		        if  (is_numeric($karakter))

		        {



		            if  ($afterChar)

		            {



		                $idx = $i;



		                $hasil = $karakter;



		            }else

		            {



		                $hasil = $hasil.$karakter;



		            }



		            $afterChar = false;



		        }else

		        {

		            $afterChar = true;



		        } //if  (is_int($karakter))



		    } //for ($i=1;$i<$strLen;$i++)



	    	if ($hasil <> "")

	    	{

		        $akhiran = substr($txt, $idx + strlen($hasil), strlen($txt));



		        $strLen = strlen($hasil);



		        $hasil = (int)($hasil) + 1;



		        if  ($strLen > 1)

		        {



		        	$hasil = str_pad($hasil, $strLen, "0", STR_PAD_LEFT);

		        }



    			$hasil = substr($txt, 0, $idx).$hasil.$akhiran;

			}

			else

			{

				$hasil = $Text;

			}//if ($hasil <> "")



        	return $hasil;



    	} //function GetNextNo($nomor)



	} //if ( ! function_exists('GetNextNo') )





	//terbilang

	if ( ! function_exists('terbilang') )

	{



			function terbilang($angka) {

			    // pastikan kita hanya berususan dengan tipe data numeric

			    $angka = (float)$angka;



			    // array bilangan

			    // sepuluh dan sebelas merupakan special karena awalan 'se'

			    $bilangan = array(

			            '',

			            'satu',

			            'dua',

			            'tiga',

			            'empat',

			            'lima',

			            'enam',

			            'tujuh',

			            'delapan',

			            'sembilan',

			            'sepuluh',

			            'sebelas'

			    );



			    // pencocokan dimulai dari satuan angka terkecil

			    if ($angka < 12) {

			        // mapping angka ke index array $bilangan

			        return $bilangan[$angka];

			    } else if ($angka < 20) {

			        // bilangan 'belasan'

			        // misal 18 maka 18 - 10 = 8

			        return $bilangan[$angka - 10] . ' belas';

			    } else if ($angka < 100) {

			        // bilangan 'puluhan'

			        // misal 27 maka 27 / 10 = 2.7 (integer => 2) 'dua'

			        // untuk mendapatkan sisa bagi gunakan modulus

			        // 27 mod 10 = 7 'tujuh'

			        $hasil_bagi = (int)($angka / 10);

			        $hasil_mod = $angka % 10;

			        return trim(sprintf('%s puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));

			    } else if ($angka < 200) {

			        // bilangan 'seratusan' (itulah indonesia knp tidak satu ratus saja? :))

			        // misal 151 maka 151 = 100 = 51 (hasil berupa 'puluhan')

			        // daripada menulis ulang rutin kode puluhan maka gunakan

			        // saja fungsi rekursif dengan memanggil fungsi terbilang(51)

			        return sprintf('seratus %s', terbilang($angka - 100));

			    } else if ($angka < 1000) {

			        // bilangan 'ratusan'

			        // misal 467 maka 467 / 100 = 4,67 (integer => 4) 'empat'

			        // sisanya 467 mod 100 = 67 (berupa puluhan jadi gunakan rekursif terbilang(67))

			        $hasil_bagi = (int)($angka / 100);

			        $hasil_mod = $angka % 100;

			        return trim(sprintf('%s ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));

			    } else if ($angka < 2000) {

			        // bilangan 'seribuan'

			        // misal 1250 maka 1250 - 1000 = 250 (ratusan)

			        // gunakan rekursif terbilang(250)

			        return trim(sprintf('seribu %s', terbilang($angka - 1000)));

			    } else if ($angka < 1000000) {

			        // bilangan 'ribuan' (sampai ratusan ribu

			        $hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif

			        $hasil_mod = $angka % 1000;

			        return sprintf('%s ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));

			    } else if ($angka < 1000000000) {

			        // bilangan 'jutaan' (sampai ratusan juta)

			        // 'satu puluh' => SALAH

			        // 'satu ratus' => SALAH

			        // 'satu juta' => BENAR

			        // @#$%^ WT*



			        // hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif

			        $hasil_bagi = (int)($angka / 1000000);

			        $hasil_mod = $angka % 1000000;

			        return trim(sprintf('%s juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));

			    } else if ($angka < 1000000000000) {

			        // bilangan 'milyaran'

			        $hasil_bagi = (int)($angka / 1000000000);

			        // karena batas maksimum integer untuk 32bit sistem adalah 2147483647

			        // maka kita gunakan fmod agar dapat menghandle angka yang lebih besar

			        $hasil_mod = fmod($angka, 1000000000);

			        return trim(sprintf('%s milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));

			    } else if ($angka < 1000000000000000) {

			        // bilangan 'triliun'

			        $hasil_bagi = $angka / 1000000000000;

			        $hasil_mod = fmod($angka, 1000000000000);

			        return trim(sprintf('%s triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));

			    } else {

			        return 'Wow...';

			}

		}

	}	//if ( ! function_exists('terbilang') )





	//getTreeGridMenuRBA

	if ( ! function_exists('getTreeGridMenuRBA') )

	{



		function getTreeGridMenuRBA($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID = '0', $tipeBAB = '3BAB')

		{


			$_SESSION['treeViewDataRBA'] = '';

			$strJsonData = '[';

			recursiveTreeGridMenuRBA($induk, $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID, $tipeBAB);

			$treeViewData = $_SESSION['treeViewDataRBA'];

			$treeViewData = substr($treeViewData, 0, strlen($treeViewData) - 1);

			$strJsonData .= $treeViewData;

			$strJsonData .=']';



			return $strJsonData;

		}

    }	// if ( ! function_exists('getTreeGridMenuRBA') )



   //recursiveTreeGridMenuRBA

	if ( ! function_exists('recursiveTreeGridMenuRBA') )

	{

		function recursiveTreeGridMenuRBA($induk = '', $fieldList = '', $dataList = '', $actionList = '', $tableName = '', $fieldID = '', $fieldCode = '', $fieldName = '', $groupID = 0, $tipeBAB = '5BAB')

		    {



		    	$CI=&get_instance();



		    	$CI->load->helper('inflector');

		    	$CI->load->helper('url');



		     	$treeData = $CI->db->query("select ".$fieldList." from ".$tableName." where aktif = 1 and induk = '".$induk."' and deskripsi = '".$tipeBAB."' ");

		    	if ( ($treeData->num_rows() ) > 0 )

		    	{



		    		$i=0;

			        foreach($treeData->result_array() as $row)

			        {



			        	$objNameWord  = 'fileUpload'.$i.'Word'.rand(1,1000);

			        	$objNameExcel = 'fileUpload'.$i.'Excel'.rand(1,1000);



			          	$strShowCode = ($fieldCode <> '') && ($tableName <> 'sys_modul') ? $row[$fieldCode].' - ' : '';



			          	$strDataList = '{';



			          	foreach ($dataList as $value) {

			          		$strDataList.= '\"'. $value .'\" : \"'. $row[$value] .'\",';

			          	}



			          	$strDataList = substr($strDataList, 0, strlen($strDataList) - 1 );



			          	$strDataList.='}';



			          	//$actionChildList = ($row['Header'] == 0) ? $actionList : '';

			          	$jenisIndustri =  underscore(GetSettingValue("kelompok_industri"));

			          	$arrPrefixInstansi 		= explode('_',$CI->session->userdata('DatabaseActive'));
			 			$prefixInstansi 		= GetClientID();//$arrPrefixInstansi[2];

			          	$prefixDownloadDir = 'download/'.$jenisIndustri.'/';

			 			$namaInstansi = ($_SESSION['TipeLogin'] == 'Dinas')   ? 'dinas' : $_SESSION['NamaUPTD'];
			 			$namaInstansi = strtolower($namaInstansi);
			 			$namaInstansi = str_replace(' ', '_', $namaInstansi);

			          	$isFileExist = file_exists($prefixDownloadDir.$prefixInstansi.'/'.'download'.'/'.$namaInstansi.'/'.$row['FileDownloadWord']);

			          	$activeDir = $isFileExist ? $prefixInstansi.'/'.'download/'.$namaInstansi : 'template'.$tipeBAB;

			          	$downloadLink = $prefixDownloadDir.$activeDir.'/'.$row['FileDownloadWord'];

			          	$downloadLink = base_url($downloadLink);



			          	$downloadLinkExcel = $prefixDownloadDir.$activeDir.'/'.$row['FileDownloadExcel'];

			          	$downloadLinkExcel = base_url($downloadLinkExcel);



			          	$actionChildList =  '<a href=\"'.$downloadLink.'\" target=\"_blank\"  class=\"btn btn-sm btn-primary\"><span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;Unduh Doc</a> &nbsp; <span onclick=\"jqueryFileUploadInit(\''.$objNameWord.'\', \'anggaran/uploadFileRBA/'.$row['FileDownloadWord'].'\');\" class=\"btn btn-sm btn-success fileinput-button\"><i class=\"glyphicon glyphicon-open\"></i>&nbsp;<span>Unggah Doc</span><input type=\"file\" name=\"files\" id=\"'.$objNameWord.'\"/></span> ';



			          	$namaModul = $row[$fieldName];


			          	$jenisUsaha = GetSettingValue('jenis_usaha');

			          	if (trim($namaModul) == 'KINERJA BLUD BERJALAN')

			          	{

			         		$actionChildList =  '<a href=\"'.$downloadLink.'\" target=\"_blank\"  class=\"btn btn-sm btn-primary\"><span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;Unduh Doc</a> &nbsp; <span onclick=\"jqueryFileUploadInit(\''.$objNameWord.'\', \'anggaran/uploadFileRBA/'.$row['FileDownloadWord'].'\');\" class=\"btn btn-sm btn-success fileinput-button\"><i class=\"glyphicon glyphicon-open\"></i>&nbsp;<span>Unggah Doc</span><input type=\"file\" name=\"files\" id=\"'.$objNameWord.'\"/></span> ';

			          	}


			          	if (trim($namaModul) == 'KINERJA BLUD/BLU BERJALAN (TAHUN Anggaran - 1) DAN RENCANA BISNIS & ANGGARAN BLU/BLUD (Tahun Anggaran)')
			          	{

			          		$tahunPeriode = GetTahunPeriode();
			          		$tahunSebelumnya = $tahunPeriode - 1;

			          		$namaModul =  'KINERJA '.$jenisUsaha.' BERJALAN (TA 20XX-1) DAN RENCANA BISNIS & ANGGARAN '.$jenisUsaha.' (TA 2OXX)';

			          		$actionChildList =  '<a href=\"'.$downloadLink.'\" target=\"_blank\"  class=\"btn btn-sm btn-primary\"><span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;Unduh Doc</a> &nbsp; <span onclick=\"jqueryFileUploadInit(\''.$objNameWord.'\', \'anggaran/uploadFileRBA/'.$row['FileDownloadWord'].'\');\" class=\"btn btn-sm btn-success fileinput-button\"><i class=\"glyphicon glyphicon-open\"></i>&nbsp;<span>Unggah Doc</span><input type=\"file\" name=\"files\" id=\"'.$objNameWord.'\"/></span> ';

			          	}

			          	if (trim($namaModul) == 'RENCANA BISNIS DAN ANGGARAN BLUD (TAHUN Anggaran)')

			          	{

			          		$tahunPeriode = GetTahunPeriode();

			          		$namaModul =  'RENCANA BISNIS DAN ANGGARAN '.$jenisUsaha.' '.strtoupper(GetSettingValue("kelompok_industri"))." (".$tahunPeriode. ") ";

			          		$actionChildList =  '<a href=\"'.$downloadLink.'\" target=\"_blank\"  class=\"btn btn-sm btn-primary\"><span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;Unduh Doc</a> &nbsp; <span onclick=\"jqueryFileUploadInit(\''.$objNameWord.'\', \'anggaran/uploadFileRBA/'.$row['FileDownloadWord'].'\');\" class=\"btn btn-sm btn-success fileinput-button\"><i class=\"glyphicon glyphicon-open\"></i>&nbsp;<span>Unggah Doc</span><input type=\"file\" name=\"files\" id=\"'.$objNameWord.'\"/></span> ';

			          	}



			          	if (trim($namaModul) == 'PROYEKSI KEUANGAN TAHUN YANG AKAN DATANG (Tahun Anggaran)')

			          	{

			          		$tahunPeriode 	= GetTahunPeriode();

			          		$namaModul 		= "PROYEKSI KEUANGAN TAHUN ANGGARAN (".$tahunPeriode. ") ";

			          		$actionChildList =  '<a href=\"'.$downloadLink.'\" target=\"_blank\"  class=\"btn btn-sm btn-primary\"><span class=\"glyphicon glyphicon-download-alt\"></span>&nbsp;Unduh Doc</a> &nbsp; <span onclick=\"jqueryFileUploadInit(\''.$objNameWord.'\', \'anggaran/uploadFileRBA/'.$row['FileDownloadWord'].'\');\" class=\"btn btn-sm btn-success fileinput-button\"><i class=\"glyphicon glyphicon-open\"></i>&nbsp;<span>Unggah Doc</span><input type=\"file\" name=\"files\" id=\"'.$objNameWord.'\"/></span> ';

			          	}



			          	$strText = '{"id":'.$row[$fieldID].',"dataList" : "'.$strDataList.'", "action" : "'.$actionChildList.'", "name":"'.$strShowCode.$namaModul;



			        	$strText.= $row['Header'] ? '", "children":[' : '"},';



			        	$_SESSION['treeViewDataRBA'].= $strText;



			        	//rekursif

			        	recursiveTreeGridMenuRBA($row[$fieldCode],  $fieldList, $dataList, $actionList, $tableName, $fieldID, $fieldCode, $fieldName, $groupID, $tipeBAB);



	     				$strText2 = $row['Header'] ? ']},' : '';

			          	$_SESSION['treeViewDataRBA'] = $row['Header'] ?  substr($_SESSION['treeViewDataRBA'], 0 ,strlen($_SESSION['treeViewDataRBA']) - 1) : $_SESSION['treeViewDataRBA'];



			          	$_SESSION['treeViewDataRBA'].= $strText2;



			          	$i++;



			        } //foreach($treeData->result_array() as $row)



		      	} //if ( ($treeData->num_rows() ) > 0 )



		    }

	} //if ( ! function_exists('recursiveTreeGridMenuRBA') )


	function encrypt_decrypt($action, $string)
	{
	    $output = false;

	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'This is my secret key';
	    $secret_iv = 'This is my secret iv';

	    // hash
	    $key = hash('sha256', $secret_key);

	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    if( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    }
	    else if( $action == 'decrypt' ){
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }

	    return $output;
	} //function encrypt_decrypt($action, $string)

	function setDBConnection($hostname = '', $userName = '', $password = '', $database = '', $driver = 'mysql')
    {
      $config['hostname'] = $hostname;

      $config['username'] = $userName;

      $config['password'] = $password;

      $config['database'] = $database;

      $config['dbdriver'] = $driver;

      $config['dbprefix'] = "";

      $config['pconnect'] = FALSE;

      $config['db_debug'] = TRUE;

      $config['cache_on'] = FALSE;

      $config['cachedir'] = "";

      $config['char_set'] = "utf8";

      $config['dbcollat'] = "utf8_general_ci";

      $CI->load->database($config);

    } //function setDBConnection($hostname = '', $userName = '', $password = '', $database = '', $driver = 'mysql')


    function GetTotalFromKodeAkun($IDUPTD = '', $arrKodeAkun = array(), $periode = '', $nilai = '')
    {
    	$CI=&get_instance();

    	$IDUnitKerja    = $_SESSION['IDUnitKerja'];

		$strValueUPTD   = ($IDUPTD == '0') ? " id_uptd is null " : " id_uptd = '".$IDUPTD."' ";

		$periode    =  SanitizeParanoid($periode);
        $nilai      =  SanitizeParanoid($nilai);

        $startDate = formatDateDB(RealDateTime('', false));
        $endDate   = formatDateDB(RealDateTime('', false));

        $tahun = GetTahunPeriode();

        $startMonth = 1;

         //set periode
        if ($periode == 'Bulan')
        {
            $startDate = $tahun.'-'.$nilai.'-'.'01';
            $endDate   = $tahun.'-'.$nilai.'-'.'31';
        }

        if ($periode == 'Triwulan')
        {

            $startMonth = ($nilai == 1) ? 1 : 0;
            $endMonth   = ($nilai == 1) ? 3 : 0;

            $startMonth = ($nilai == 2) ? 4 : $startMonth;
            $endMonth   = ($nilai == 2) ? 6 : $endMonth;

            $startMonth = ($nilai == 3) ? 7 : $startMonth;
            $endMonth   = ($nilai == 3) ? 9 : $endMonth;

            $startMonth = ($nilai == 4) ? 10 : $startMonth;
            $endMonth   = ($nilai == 4) ? 12 : $endMonth;

            $startDate  = $tahun.'-'.$startMonth.'-'.'01';
            $endDate    = $tahun.'-'.$endMonth.'-'.'31';
        }

        if ($periode == 'Semester')
        {

            $startMonth = ($nilai == 1) ? 1 : 1;
            $endMonth   = ($nilai == 1) ? 6 : 6;

            $startMonth = ($nilai == 2) ? 7 : $startMonth;
            $endMonth   = ($nilai == 2) ? 12 : $endMonth;

            $startDate = $tahun.'-'.$startMonth.'-'.'01';
            $endDate   = $tahun.'-'.$endMonth.'-'.'31';

        }

        if ($periode == 'Tahun')
        {
            $startDate = $tahun.'-01-01';
            $endDate   = $tahun.'-12-31';
        }

        $total = 0;

        for($i=0;$i<count($arrKodeAkun);$i++)
        {
        	$strKodeAkun = $arrKodeAkun[$i];

    		$data = $CI->db->query("SELECT COALESCE(SUM(COALESCE(debet_akhir,0)),0) - COALESCE(SUM(COALESCE(kredit_akhir, 0)),0) as Total
									FROM trx_jurnal_det trxJurnalDet
									INNER JOIN trx_jurnal trxJurnal
									ON trxJurnalDet.id_jurnal = trxJurnal.id_jurnal
									AND id_akun IN (SELECT id_akun FROM mst_akun WHERE CONCAT(kode_induk,'.',kode_akun) LIKE '".$strKodeAkun."%'  )
									AND id_unit_kerja ='".$IDUnitKerja."' and ".$strValueUPTD."
									AND (tgl_jurnal >= '".$startDate." 00:00:00' AND tgl_jurnal <= '".$endDate." 23:59:59')");

    		$loopTotal 	= $data->first_row()->Total;
    		$total += GetTotal($strKodeAkun, $loopTotal);

    	}

    	return $total;

    }

    function GetCalculateRatioValue($pembilang = 0, $penyebut = 0, $tipe = '')
    {
    	$value = 0;

    	if ($tipe == 'PenagihanPiutang'){
    		$value = ( ($pembilang * 360) / $penyebut) * 100;
    	}
    	else
    		$value = ($pembilang/$penyebut) * 100;

    	return $value;
    }

    //GetRevisiRBA
    if ( ! function_exists('GetRevisiRBA') )
	{
	    function GetRevisiRBA($revisi = '', $tabelName = '')
	    {
	    	$CI=&get_instance();

	    	$IDUnitKerja    = $_SESSION['IDUnitKerja'];

			$strValueUPTD   = GetSQLUPTDValue('select','value');

	    	$selectQuery = "select set_setting_value as revisi from set_setting where set_setting_nama = 'revisi_perubahan_rba'";

	    	$data = $CI->db->query($selectQuery);

	    	$revisi = $data->first_row()->revisi;
	    	$revisi = ($revisi > 0) ? $revisi : $revisi + 1;


			return $revisi;
	    }
	}
	
	if ( ! function_exists('ConstructMessageResponse') )

	{

		function ConstructMessageResponse($messageResponseText = 'Unsuccesfully Retrieved Data', $alertType, $isNeedRefresh = false, $refreshURL = '', $glyphicon = '')

		{



			$messageResponseText = ($glyphicon <> '') ?  "<span class='glyphicon glyphicon-".$glyphicon."'>&nbsp;</span>".$messageResponseText : $messageResponseText;



			$messageResponseText = "<div class='alert alert-".$alertType."' id='alertMessage' alert-dismissible' role='alert'>".$messageResponseText."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> </div>";	



			return $messageResponseText;

		}

	}	

    //checkAlurPenatausahaanAktif
    if ( ! function_exists('checkAlurPenatausahaanAktif') )
	{
	    function checkAlurPenatausahaanAktif($modul = 'SPP')
	    {
	    	$arrAlurBLUD  = explode('-', GetSettingValue('alur_sistem_blud'));
	        $isAlurAktif = in_array($modul, $arrAlurBLUD);

	        if (!$isAlurAktif)
	        {
	        	$strMessage  = 'Alur Penatausahaan Untuk Modul Ini Tidak Aktif';
	            $messageData = ConstructMessageResponse($strMessage , 'warning');
	            echo $messageData."<script>$('.box').remove();$('script').remove();</script>";
	        }
	    }
	}

    //isAlurPenatausahaanAktif
    if ( ! function_exists('isAlurPenatausahaanAktif') )
	{

	    function isAlurPenatausahaanAktif($modul = 'SPP')
	    {
	    	$arrAlurBLUD  = explode('-', GetSettingValue('alur_sistem_blud'));
	        $isAlurAktif = in_array($modul, $arrAlurBLUD);

	     	return $isAlurAktif;
	    }
	}

    //isPerubahanAktif
	if ( ! function_exists('isPerubahanAktif') )
	{

		function isPerubahanAktif($table)

	  	{
	  		$CI=&get_instance();

	  		$IDUnitKerja 	= $_SESSION['IDUnitKerja'];

	  		$jenisIndustri = GetSettingValue('kelompok_industri');

	  		$strValueUPTD   = GetSQLUPTDValue('select','value');

	  		$strValueUPTD   = ($jenisIndustri == 'Puskesmas') ? " id_uptd  = (select id_uptd from mst_uptd limit 1) " : $strValueUPTD;

	  		$tableName 		= GetTabelRBA($table);

		  	$revisisebelumnya = GetPerubahanAktif('sebelumPerubahan', $tableName);

	        $query = $CI->db->query("select id_anggaran_".$table." from ".$tableName."
	                                  where revisi > '$revisisebelumnya'
	                                  and id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD." order by id_anggaran_".$table."
	                                  desc limit 1");

	      	$isAdaPerubahan = $query->num_rows() > 0;

	        return $isAdaPerubahan;



	  	}

	}	//if ( ! function_exists('isPerubahanAktif') )

	//GetPerubahanRBA
	if ( ! function_exists('GetPerubahanRBA') )

	{

		function GetPerubahanRBA()

	  	{
	  		$jenisIndustri = GetSettingValue('kelompok_industri');

	  		$IDUnitKerja    = $_SESSION['IDUnitKerja'];

 			$strValueUPTD   = GetSQLUPTDValue('select','value');

 			$strValueUPTD   = ($jenisIndustri == 'Puskesmas') ? " id_uptd  = (select id_uptd from mst_uptd limit 1) " : $strValueUPTD;

 			$revisi = GetRevisiRBA();

	  		$CI=&get_instance();

	        $selectQuery = $CI->db->query("SELECT pengesahan  AS Pengesahan

	                                     FROM ".GetTabelRBA('biaya')."

	                                     WHERE id_unit_kerja = '".$IDUnitKerja."' and ".$strValueUPTD." AND revisi='$revisi'");


	        return ($selectQuery->num_rows() > 0) ? $selectQuery->first_row()->Pengesahan == 0 ? ' - Perubahan' : ' - Perubahan (Terkunci)' : '';



	    }

	} //if ( ! function_exists('GetPerubahanRBA') )


    //GetPerubahanAktif
	if ( ! function_exists('GetPerubahanAktif') )

	{
	    function GetPerubahanAktif($tipe = 'sebelumPerubahan', $tabelName = 'trx_anggaran_biaya')
	    {
	    	$CI=&get_instance();

	    	$IDUnitKerja    = $_SESSION['IDUnitKerja'];

			$strValueUPTD   = GetSQLUPTDValue('select','value');

			$revisiPerubahan  = GetSettingValue('revisi_perubahan_rba');
			$revisiPerubahan  = ($revisiPerubahan == 0) ? $revisiPerubahan + 1 : $revisiPerubahan;

			$revisiSebelumnya = ($revisiPerubahan - 1 < 0) ? 0 : $revisiPerubahan - 1;
/*
			$selectQuery = $CI->db->query("SELECT COALESCE(MAX(revisi),0) AS revisi
										   FROM ".$tabelName."
							  			   WHERE revisi < '$revisiPerubahan'
							  			   and id_unit_kerja = '".$IDUnitKerja."' AND ".$strValueUPTD." ");

			$revisi = $selectQuery->first_row()->revisi;*/

			$revisi = ($tipe == 'sebelumPerubahan') ? $revisiSebelumnya : $revisiPerubahan;

			//$revisi = ($tipe == 'sebelumPerubahan') ? ($revisi > 0) ? $revisi - 1 : 0 : ($revisi == 0) ? $revisi + 1 : $revisi;

			return $revisi;

	    }
	}

	//GetTabelRBA
	if ( ! function_exists('GetTabelRBA') )
	{
	    function GetTabelRBA($tipe, $isTableDetail = false, $isSebelumPerubahan = false)
	    {
	    	$CI=&get_instance();

			$IDUnitKerja    = $_SESSION['IDUnitKerja'];

			$strValueUPTD   = GetSQLUPTDValue('select','value');

			$strTableDetail = ($isTableDetail) ? "_det" : "";

			$strTableName  = ($tipe == 'pendapatan') ? "pendapatan" : "biaya";
			$strTableName  .= $strTableDetail;
			$strTableName  = "trx_anggaran_".$strTableName;

			//$strTableName1 = 'trx_anggaran_'.$strTableName."_perubahan";
			//$strTableName2 = ($isSebelumPerubahan) ? 'trx_anggaran_'.$strTableName : $strTableName1;
			//$strTableName  = $strTableName2;

			//check dulu di tabel setelah perubahan
			/*$selectQuery = $CI->db->query("SELECT id_anggaran_".$tipe." as IDAnggaran FROM ".$strTableName."
							  			  WHERE id_unit_kerja = '".$IDUnitKerja."' AND ".$strValueUPTD." limit 1");

			$IDAnggaran = $selectQuery->first_row()->IDAnggaran;

			//tidak ditemukan ambil dari tabel sebelum perubahan
			if ($selectQuery->num_rows() == 0)
			{
				$strTableName = ($tipe == 'pendapatan') ? "pendapatan" : "biaya";
				$strTableName = 'trx_anggaran_'.$strTableName.$strTableDetail;
			}


			//check jika ini adalah tabel detail
			if ($strTableDetail <> '')
			{
				$strTableName  = ($tipe == 'pendapatan') ? "pendapatan" : "biaya";
				$strTableName1 = 'trx_anggaran_'.$strTableName.$strTableDetail."_perubahan";
				$strTableName2 = ($isSebelumPerubahan) ? 'trx_anggaran_'.$strTableName.$strTableDetail : $strTableName1;
				$strTableName  = $strTableName2;

				//check dulu di tabel setelah perubahan
				$selectQuery = $CI->db->query("SELECT id_anggaran_".$tipe."_det AS IDAnggaranDet
											   FROM ".$strTableName."
								  			   WHERE id_anggaran_".$tipe." = '".$IDAnggaran."' limit 1");

				//tidak ditemukan ambil dari tabel sebelum perubahan
				if ($selectQuery->num_rows() == 0)
				{
					$strTableName = ($tipe == 'pendapatan') ? "pendapatan" : "biaya";
					$strTableName = 'trx_anggaran_'.$strTableName.$strTableDetail;
				}

			} //if ($strTableDetail <> '')*/

			return $strTableName;
	    }
	}

    function GetScoringFromValue($tipe = 'RasioKas', $value = '0', $convertToStar = false)
    {
    	$score 		= 0;
		$countStar 	= 0;

    	if ($tipe == 'RasioKas')
    	{
    		$score = ($value > 1080) ? 2 : $score;
    		$score = ($value > 960 && $value <= 1080) ? 4 : $score;
    		$score = ($value > 840 && $value <= 960) ? 6 : $score;
    		$score = ($value > 720 && $value <= 840) ? 8 : $score;
    		$score = ($value > 600 && $value <= 720) ? 10 : $score;
    		$score = ($value > 480 && $value <= 600) ? 8 : $score;
    		$score = ($value > 360 && $value <= 480) ? 6 : $score;
    		$score = ($value > 240 && $value <= 360) ? 4 : $score;
    		$score = ($value > 120 && $value <= 240) ? 2 : $score;
    		$score = ($value <= 120) ? 0 : $score;


    		if ($convertToStar)
    		{
    			$countStar = ($score > 8 ) ? 5 : $countStar;
    			$countStar = ($score > 6 && $score <= 8) ? 4 : $countStar;
    			$countStar = ($score > 4 && $score <= 6) ? 3 : $countStar;
    			$countStar = ($score > 2 && $score <= 4) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 2) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;
    		}
    	}

    	if ($tipe == 'RasioLancar')
    	{
    		$score = ($value > 600) ? 15 : $score;
    		$score = ($value > 480 && $value <= 600) ? 12 : $score;
    		$score = ($value > 360 && $value <= 480) ? 9 : $score;
    		$score = ($value > 240 && $value <= 360) ? 6 : $score;
    		$score = ($value > 120 && $value <= 240) ? 3 : $score;
    		$score = ($value <= 120) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = ($score > 12) ? 5 : $countStar;
    			$countStar = ($score > 9 && $score <= 12) ? 4 : $countStar;
    			$countStar = ($score > 6 && $score <= 9) ? 3 : $countStar;
    			$countStar = ($score > 3 && $score <= 6) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 3) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;
    		}
    	}

    	if ($tipe == 'PenagihanPiutang')
    	{

    		$score = ($value > 10) ? 15 : $score;
    		$score = ($value >= 10 && $value < 20) ? 12 : $score;
    		$score = ($value >= 20 && $value < 30) ? 9 : $score;
    		$score = ($value >= 30 && $value < 40) ? 6 : $score;
    		$score = ($value >= 40 && $value < 50) ? 3 : $score;
    		$score = ($value >= 50) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = ($score > 12) ? 5 : $countStar;
    			$countStar = ($score > 9 && $score <= 12) ? 4 : $countStar;
    			$countStar = ($score > 6 && $score <= 9) ? 3 : $countStar;
    			$countStar = ($score > 3 && $score <= 6) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 3) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;
    		}
    	}

    	if ($tipe == 'PerputaranAsetTetap')
    	{
    		$score = ($value > 25) ? 5 : $score;
    		$score = ($value >= 25 && $value < 20 ) ? 4 : $score;
    		$score = ($value >= 20 && $value < 15 ) ? 3 : $score;
    		$score = ($value >= 15 && $value < 10 ) ? 2 : $score;
    		$score = ($value >= 10 && $value < 5 ) ? 1 : $score;
    		$score = ($value <=5 ) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = $score;
    		}
    	}

    	if ($tipe == 'ImbalanAtasAktivaTetap')
    	{
    		$score = ($value > 9) ? 5 : $score;
    		$score = ($value > 8 && $value <= 9 ) ? 4.5 : $score;
    		$score = ($value > 7 && $value <= 8 ) ? 4 : $score;
    		$score = ($value > 6 && $value <= 7 ) ? 3.5 : $score;
    		$score = ($value > 5 && $value <= 6 ) ? 3 : $score;
    		$score = ($value > 4 && $value <= 5 ) ? 2.5 : $score;
    		$score = ($value > 3 && $value <= 4 ) ? 2 : $score;
    		$score = ($value > 2 && $value <= 3 ) ? 1.5 : $score;
    		$score = ($value > 1 && $value <= 2 ) ? 1 : $score;
    		$score = ($value > 0 && $value <= 1 ) ? 0.5 : $score;
    		$score = ($value <= 0 ) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = ($score > 4) ? 5 : $countStar;
    			$countStar = ($score > 3 && $score <= 4) ? 4 : $countStar;
    			$countStar = ($score > 2 && $score <= 3) ? 3 : $countStar;
    			$countStar = ($score > 1 && $score <= 2) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 1) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;
    		}
    	}

    	if ($tipe == 'ImbalanEkuitas')
    	{
    		$score = ($value > 9) ? 5 : $score;
    		$score = ($value >= 9 && $value < 8 ) ? 4.5 : $score;
    		$score = ($value >= 8 && $value < 7 ) ? 4 : $score;
    		$score = ($value >= 7 && $value < 6 ) ? 3.5 : $score;
    		$score = ($value >= 6 && $value < 5 ) ? 3 : $score;
    		$score = ($value >= 5 && $value < 4 ) ? 2.5 : $score;
    		$score = ($value >= 4 && $value < 3 ) ? 2 : $score;
    		$score = ($value >= 3 && $value < 2 ) ? 1.5 : $score;
    		$score = ($value >= 2 && $value < 1 ) ? 1 : $score;
    		$score = ($value >= 1 && $value < 0 ) ? 0.5 : $score;
    		$score = ($value <= 0 ) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = ($score > 4) ? 5 : $countStar;
    			$countStar = ($score > 3 && $score <= 4) ? 4 : $countStar;
    			$countStar = ($score > 2 && $score <= 3) ? 3 : $countStar;
    			$countStar = ($score > 1 && $score <= 2) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 1) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;
    		}
    	}

    	if ($tipe == 'RasioPendapatanPNPBTerhadapBiayaOperasional')
    	{
    		$score = ($value > 75) ? 10 : $score;
    		$score = ($value >= 75 && $value < 67.5 ) ? 9 : $score;
    		$score = ($value >= 67.5 && $value < 60 ) ? 8 : $score;
    		$score = ($value >= 60 && $value < 52.5 ) ? 7 : $score;
    		$score = ($value >= 52.5 && $value < 45 ) ? 6 : $score;
    		$score = ($value >= 45 && $value < 37.5 ) ? 5 : $score;
    		$score = ($value >= 37.5 && $value < 30 ) ? 4 : $score;
    		$score = ($value >= 30 && $value < 22.5 ) ? 3 : $score;
    		$score = ($value >= 22.5 && $value < 15 ) ? 2 : $score;
    		$score = ($value >= 15 && $value < 7.5 ) ? 1 : $score;
    		$score = ($value <= 7.5 ) ? 0 : $score;

    		if ($convertToStar)
    		{
    			$countStar = ($score > 8) ? 5 : $countStar;
    			$countStar = ($score > 6 && $score <= 8) ? 4 : $countStar;
    			$countStar = ($score > 4 && $score <= 6) ? 3 : $countStar;
    			$countStar = ($score > 2 && $score <= 4) ? 2 : $countStar;
    			$countStar = ($score > 0 && $score <= 2) ? 1 : $countStar;
    			$countStar = ($score <= 0) ? 0 : $countStar;
    			$score = $countStar;

    		}
    	}

    	if ($convertToStar)
    	{
    		$strStar = '';

    		for($i=0;$i<$countStar;$i++)
    		{
    			$strStar.="<span aria-hidden='true' class='glyphicon glyphicon-star'></span>&nbsp;";
    		}

    		$score = "<span class='badge'>".$strStar."</span>";
    	}



    	return $score;
    }
	
	function readmore($word, $limit)
	{
		$strword = explode(" ",$word);
		
		foreach($strword as $key => $words)
		{
			if($key <= $limit)
			{
				$data['word'][] = $words;
			}
		}
		
		$strword = implode(" ", $data['word'])." . . .";
		
		return $strword;
		
		
	}

	function tampil_pengaturanz($namakolom)

	{

		$ci =& get_instance();

		$ci->db->where("kolom",$namakolom);

		$ambil=$ci->db->get("pengaturan");

		$pecah=$ambil->row_array();

		return $pecah['isi'];

	}

/* End of file func_helper.php */


/* End of file func_helper.php */
