<?php
	
    // function getData() {
    //     $getData = json_decode(file_get_contents('http://hasanadiguzel.com.tr/api/kurgetir'));
        
    //     return $getData->TCMB_AnlikKurBilgileri->BanknoteSelling;
    // }
    // print_r(getData());






 
/**enes ışık kodu ancak banknoteselling'e ulaşmıyor */
$kurlar=simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
//  print_r($kurlar); exit();
$dolar=$kurlar->Currency[0]->BanknoteSelling;
// $euro=$kurlar->Currency[3]->BanknoteSelling;

//  $dolar=str_replace(".", ",", $dolar);
// $euro=str_replace(".", ",", $euro);

//  echo "Dolar: ".$dolar;
// echo "<br>";
// echo "Euro: ".$euro;




// $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');


// $usd_selling = $connect_web->Currency[0]->BanknoteSelling;

// $USD = $usd_selling;



?>
