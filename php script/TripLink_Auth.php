<?php
$frow = "ECN;CreditLimitCurrency;IssuingBank;Trans_ID;Date_Time;Requested_Date;Activation_Date;Authorisation_Date;Settlement_Date;Expiry_Date;VAN_Currency;VAN_Amt;Auth_Amt;Net_Settled;Refund_Amt;Available_Balance;CreditAmount;DebitAmount;Balance;Auth_Count;Activity;Details;Status;VAN_MODE;UserReference1;UserReference2;UserReference3;UserReference4;Merchant;CardType;IntegratorName;UserReference5;UserReference6;UserReference7;UserReference8; \n";
file_put_contents('TripLink_auth.csv',$frow);
$strConnect = "host= 10.2.4.153 port=5432 dbname= core user= v.cherner password= bHCjg9s9UuDd ";
$conn = pg_connect($strConnect);
function kama_parse_csv_file( $file_path, $file_encodings = ['cp1251','UTF-8'], $col_delimiter = '', $row_delimiter = "" ){

	if( ! file_exists($file_path) )
		return false;

	$cont = trim( file_get_contents( $file_path ) );

	$encoded_cont = mb_convert_encoding( $cont, 'UTF-8', mb_detect_encoding($cont, $file_encodings) );

	unset( $cont );

	// определим разделитель
	if( ! $row_delimiter ){
		$row_delimiter = "\r\n";
		if( false === strpos($encoded_cont, "\r\n") )
			$row_delimiter = "\n";
	}

	$lines = explode( $row_delimiter, trim($encoded_cont) );
	$lines = array_filter( $lines );
	$lines = array_map( 'trim', $lines );

	// авто-определим разделитель из двух возможных: ';' или ','.
	// для расчета берем не больше 30 строк
	if( ! $col_delimiter ){
		$lines10 = array_slice( $lines, 0, 30 );

		// если в строке нет одного из разделителей, то значит другой точно он...
		foreach( $lines10 as $line ){
			if( ! strpos( $line, ',') ) $col_delimiter = ';';
			if( ! strpos( $line, ';') ) $col_delimiter = ',';

			if( $col_delimiter ) break;
		}

		// если первый способ не дал результатов, то погружаемся в задачу и считаем кол разделителей в каждой строке.
		// где больше одинаковых количеств найденного разделителя, тот и разделитель...
		if( ! $col_delimiter ){
			$delim_counts = array( ';'=>array(), ','=>array() );
			foreach( $lines10 as $line ){
				$delim_counts[','][] = substr_count( $line, ',' );
				$delim_counts[';'][] = substr_count( $line, ';' );
			}

			$delim_counts = array_map( 'array_filter', $delim_counts ); // уберем нули

			// кол-во одинаковых значений массива - это потенциальный разделитель
			$delim_counts = array_map( 'array_count_values', $delim_counts );

			$delim_counts = array_map( 'max', $delim_counts ); // берем только макс. значения вхождений

			if( $delim_counts[';'] === $delim_counts[','] )
				return array('Не удалось определить разделитель колонок.');

			$col_delimiter = array_search( max($delim_counts), $delim_counts );
		}

	}

	$data = [];
	foreach( $lines as $key => $line ){
		$data[] = str_getcsv( $line, $col_delimiter ); // linedata
		unset( $lines[$key] );
	}

	return $data;
}

$data = kama_parse_csv_file( 'file.csv' );
foreach ($data as $pars) {
	$Details = $pars['9'];
	$Status = $pars['20'];
	print_r($pars);
	$UserReference2 = '';
	if ($Details =='Refund' and $Status=='success')
	{
		//refund
		$ECN = 'aviacenter#aviacenter';
		$CreditLimitCurrency = $pars ['13'];
		$IssuingBank = 'TripLink';
		$Trans_ID = mt_rand(5, 9999999999);
		$Date_Time = $pars ['10']; //Доделать
		$Date_Time = substr("$Date_Time", 0,10);
		$Date_Time = str_replace("-","",$Date_Time);
		$Settlement_Date ='';
		$Expiry_Date = '';
		$VAN_Currency = $pars['13'];
		$VAN_Amt = $pars['15'];
		$VAN_Amt = str_replace("-","",$VAN_Amt);
		$Auth_Amt = $VAN_Amt;
		$Net_Settled = 0 ;
		$Refund_Amt = $VAN_Amt;
		$Available_Balance = $VAN_Amt;
		$CreditAmount =$VAN_Amt;
		$DebitAmount = 0;
		$Balance = $VAN_Amt;
		$Auth_Count = 1;
		$Activity = 'VAN Refunded';
		$Details =$pars ['9'];
		$Status = $pars['20'];
		$VAN_MODE = 'Virtual Card';;
		$UserReference1 = $pars['33'];
		$UserReference3 = $pars['34'];
		$UserReference4 = '';
		$Merchant = 'Airlaine';
		$CardType = 'virtual_card';
		$IntegratorName = $pars['30'];
		$UserReference5 = '';
		$UserReference6 = '';
		$UserReference7 = '';
		$UserReference8 = '';
		$sql = "select ord.billing_number from tol.order ord
join tol.service_cart sc on sc.order_id=ord.id
join tol.ticket_avia_v2 tic on tic.id=sc.ticket_uid
where tic.locator = '$UserReference1';";
		print_r($sql);
		$result = pg_query($conn, $sql);
		$arr = pg_fetch_all($result);
		foreach ($arr as $pars) {
			$UserReference2 = $pars['billing_number'];
		}
		$strnew = $ECN.",".$CreditLimitCurrency.",".$IssuingBank.",".$Trans_ID.",".$Date_Time.",".$Date_Time.",".$Date_Time.",".$Date_Time.",".$Settlement_Date.",".$Expiry_Date.",".$VAN_Currency.",".$VAN_Amt.",".$Auth_Amt.",".$Net_Settled.",".$Refund_Amt.",".$Available_Balance.",".$CreditAmount.",".$DebitAmount.",".$Balance.",".$Auth_Count.",".$Activity.",".$Details.",".$Status.",".$VAN_MODE.",".$UserReference1.",".$UserReference2.",".$UserReference3.",".$UserReference4.",".$Merchant.",".$CardType.",".$IntegratorName.",".$UserReference5.",".$UserReference6.",".$UserReference7.",".$UserReference8. "\n";
		file_put_contents('TripLink_auth'.'.csv',$strnew, FILE_APPEND | LOCK_EX);
	}
//take money
	if ($Details =='Authorization Approval (Purchase)' and $Status=='success')
	{
		$ECN = 'aviacenter#aviacenter';
		$CreditLimitCurrency = $pars ['13'];
		$IssuingBank = 'TripLink';
		$Trans_ID = mt_rand(5, 9999999999);
		$Date_Time = $pars ['10']; //Доделать
		$Date_Time = substr("$Date_Time", 0,10);
		$Date_Time = str_replace("-","",$Date_Time);
		$Authorisation_Date = $Date_Time;
		$Settlement_Date =$Date_Time;
		$Expiry_Date = $Date_Time;
		$VAN_Currency = $pars['13'];
		$VAN_Amt =$pars ['15'];
		$Auth_Amt = $VAN_Amt;
		$Net_Settled = 0 ;
		$Refund_Amt = 0;
		$Available_Balance = 0;
		$CreditAmount =0;
		$DebitAmount = $VAN_Amt;
		$Balance = $VAN_Amt;
		$Auth_Count = 2;
		$Activity = 'VAN Issued';
		$Details = $pars['9'];
		$Status = $pars['20'];
		$VAN_MODE = 'Virtual Card';
		$UserReference1 = $pars['33'];
		$UserReference3 = $pars['34'];
		$UserReference4 = '';
		$Merchant = 'Airlaine';
		$CardType = $pars['18'];
		$IntegratorName = $pars['30'];
		$UserReference5 = '';
		$UserReference6 = '';
		$UserReference7 = '';
		$UserReference8 = '';
		$sql = "select ord.billing_number from tol.order ord
join tol.service_cart sc on sc.order_id=ord.id
join tol.ticket_avia_v2 tic on tic.id=sc.ticket_uid
where tic.locator = '$UserReference1';";
		$result = pg_query($conn, $sql);
		$arr = pg_fetch_all($result);
		foreach ($arr as $pars) {
			$UserReference2 = $pars['billing_number'];
		}
		$strnew = $ECN.",".$CreditLimitCurrency.",".$IssuingBank.",".$Trans_ID.",".$Date_Time.",".$Date_Time.",".$Date_Time.",".$Date_Time.",".$Settlement_Date.",".$Expiry_Date.",".$VAN_Currency.",".$VAN_Amt.",".$Auth_Amt.",".$Net_Settled.",".$Refund_Amt.",".$Available_Balance.",".$CreditAmount.",".$DebitAmount.",".$Balance.",".$Auth_Count.",".$Activity.",".$Details.",".$Status.",".$VAN_MODE.",".$UserReference1.",".$UserReference2.",".$UserReference3.",".$UserReference4.",".$Merchant.",".$CardType.",".$IntegratorName.",".$UserReference5.",".$UserReference6.",".$UserReference7.",".$UserReference8. "\n";
		file_put_contents('TripLink_auth.csv',$strnew, FILE_APPEND | LOCK_EX);


	}
}
// $fileName = 'TripLink_auth.csv';
// $localFilePath = __DIR__ . "/{$fileName}";
// function upload($filenameInFtp, $localFilePath)
// {
//     $login = "sofi_ecom";
//     $pass = "N4k2nNaXSR3UDmw";
//     $host = "10.2.251.24";
//     $path = "/triplink";

//     $connect = ftp_connect($host);

//     if (!$connect) {
//         throw new Exception('sheat could not connect');
//     }

//     try {
//         $result = ftp_login($connect, $login, $pass);

//         if ($result == false) {
//             throw new Exception('sheat could not login');
//         }

//         if (ftp_chdir($connect, $path)) {
//             ftp_put($connect, $filenameInFtp, $localFilePath, FTP_BINARY);
//         } else {
//             throw new Exception('sheat could not change  directory');
//         }
//     } catch (\Throwable $e) {
//         var_dump("there is error like {$e->getMessage()}");
//     } finally {
//         ftp_quit($connect);
//     }

//     unlink($localFilePath);
// }

// upload($fileName, $localFilePath);
?>

