

  <?php 
  		//this section is for multiple urls to compare with the existing web like:
  		//$keywords = array("popchartlab.com, google.com, yahoo.com");
  		if(isset($_POST['compare'])){
	  		$abc = json_encode($_POST['compare']);
	  		$abc = str_replace('[','(',$abc);
	  		$abc = str_replace(']',')',$abc);
	  		$abc = explode(",",$abc);
	  		$keywords = $abc;
	  		//$str = "Hello world. It's a beautiful day.";			
		}else{
			$keywords = array("popchartlab.com");
		}		
	  	
	  	$allUrl = '';
	  	
		foreach($keywords as $val){
			$allUrl .= '{"keyword":"'.$val.'","geo":"","time":"today 5-y"}'.',';
		}
		
		$allUrls = "[$allUrl]";
		$allUrls = str_replace(',]',']',$allUrls);
  		//var_dump($allUrls);exit();
		
		echo $allUrls;

	function getAllUrls(){
	 	$keywords = array("facebook", "twitter", "youtube");
	  	$allUrl = '';
	  	
		foreach($keywords as $val){
			$allUrl .= '{"keyword":"'.$val.'","geo":"","time":"today 3-m"}'.',';
		}
		
		$allUrls = "[$allUrl]";
		$allUrls = str_replace(',]',']',$allUrls);
		
		$url = "
			<script>
				var allUrls = $allUrls;
			</script>
		";	
		return $url;
	}
	  


  ?>

