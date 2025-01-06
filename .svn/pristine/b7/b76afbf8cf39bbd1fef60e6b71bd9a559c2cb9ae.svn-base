
<?php
	set_time_limit(0);
	
	if(isset($_POST['url'])){
		$url = 	$_POST['url'];
	}else{
		$url = 	"popchartlab.com";
	}
	$url = str_replace('www.','',$url);
	//var_dump($url);exit();
	$rankInfo = array();
	$rankInfo['extra_site_info'] = get_extra_data($url);	
	
	echo json_encode($rankInfo);
	
	//Api from siteprice for site worth information
	function get_extra_data($url){
	    //extra site information
		//$worthofwebsite= simplexml_load_file('http://www.siteprice.org/WorthApi.aspx?type=2&key=testkey&url='.$url);//return data array
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

