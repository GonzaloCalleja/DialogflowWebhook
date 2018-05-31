<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
    
    	$city = $json->queryResult->parameters->geocity;
   
    	$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=91418790fd46c207c3a5fa5b1411018a';
    
    	$requestWeather = file_get_contents($url);
	$jsonWeather = json_decode($requestWeather);
	
	$temp = $jsonWeather->main->temp;
    	$desc = $jsonWeather->weather[0]->description;
    	$name = $jsonWeather->name;
    
    	$speech = "It looks like in " . $name . " it's " . $temp . " degrees, with " . $desc . ".";
	
	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
