<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
    
    	$city = $json['queryResult']['parameters']['geo-city'];
   
    	$url = 'http://api.openweathermap.org/data/2.5/weather?q=Madrid&units=metric&appid=91418790fd46c207c3a5fa5b1411018a';
    
    	$requestWeather = file_get_contents($url);
	
	$jsonWeather = json_decode($requestWeather);
	
	$response = new \stdClass();
	$response->fulfillmentText = $jsonWeather->name;
	$response->test = $city;
	
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
