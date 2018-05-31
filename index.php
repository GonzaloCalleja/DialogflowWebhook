<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
   
    	$url = 'http://api.openweathermap.org/data/2.5/weather?q=Madrid&units=metric&appid=91418790fd46c207c3a5fa5b1411018a';
    
    	$requestWeather = file_get_contents($url);
	
	$jsonWeather = json_decode($requestWeather);

	echo json_encode($jsonWeather);
}
else
{
	echo "Method not allowed";
}

?>
