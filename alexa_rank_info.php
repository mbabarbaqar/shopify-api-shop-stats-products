
<?php
	set_time_limit(0);
	
	if(isset($_POST['url'])){
		$url = 	$_POST['url'];
	}else{
		$url = 	"popchartlab.com";
	}
	
	//var_dump($url);exit();
	getAlexaInfo($url);	
	
	//Basic Alexa information from Alexa Api
	function getAlexaInfo($url){
		//var_dump($url);exit();
	    //$url='popchartlab.com';
	    $rankInfo = array();
	    $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url='.$url);
	    $rank=isset($xml->SD[1]->POPULARITY)?$xml->SD[1]->POPULARITY->attributes()->TEXT:0;
	    $country_rank=isset($xml->SD[1]->COUNTRY)?$xml->SD[1]->COUNTRY->attributes()->RANK:0;
	    $country_name=isset($xml->SD[1]->COUNTRY)?$xml->SD[1]->COUNTRY->attributes()->NAME:0;
	    $country_code=isset($xml->SD[1]->COUNTRY)?$xml->SD[1]->COUNTRY->attributes()->CODE:0;
	    $web=(string)$xml->SD[0]->attributes()->HOST;
	    $rankInfo['url'] = $url;
	    $rankInfo['rank'] = $rank;
	    $rankInfo['country_name'] = $country_name;
	    $rankInfo['country_code'] = $country_code;
	    $rankInfo['country_rank'] = $country_rank;
	    $rankInfo['visitors'] = round((pow($rank, (-0.732)))*7000000);
	    echo json_encode($rankInfo);
	}
	
	//Api from siteprice for site worth information
	function get_extra_data($url){
	    //extra site information
		$worthofwebsite= file_get_contents('http://www.siteprice.org/WorthApi.aspx?type=2&key=testkey&url='.$url); 
		$worthofwebsite = str_replace('popchartlab.com','',$worthofwebsite);

		$worthofwebsite = str_replace('<worth>','<br /><span class="label label-success">Worth of Site:</span> $',$worthofwebsite);
		$worthofwebsite = str_replace('</worth>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<pr>','<span class="label label-success">Page Rank</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</pr>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<fb>','<span class="label label-success">Facebook Count:</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</fb>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<tw>','<span class="label label-success">Twitter Share Count:</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</tw>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<gp>','<span class="label label-success">Google Plus </span>',$worthofwebsite);
		$worthofwebsite = str_replace('</gp>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<bl>','<span class="label label-success">Total Backlink Count</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</bl>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<duvc>','<span class="label label-success">Daily Visitors</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</duvc>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<dar>','<span class="label label-success">Daily Revenue</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</dar>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<gic>','<span class="label label-success">Google Index Count</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</gic>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<yic>','<span class="label label-success">Yahoo Index Count</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</yic>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<bic>','<span class="label label-success">Bing Index Count</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</bic>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<ar>','<span class="label label-success">Alexa Rank:</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</ar>','<br />',$worthofwebsite);

		$worthofwebsite = str_replace('<hp>','<span class="label label-danger">Hosting Provider</span> ',$worthofwebsite);
		$worthofwebsite = str_replace('</hp>','<br />',$worthofwebsite);
		
		return $worthofwebsite;
	}//returns extra info of a web url

?>

