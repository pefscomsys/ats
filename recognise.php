<?php
//Shorten
define('DS',DIRECTORY_SEPARATOR);

/**
 * Check tmp dir and write permissions
 */
if( ! file_exists('tmp') ){

	if( ! mkdir('tmp') ){
		//Try to create
		$response['error']= 'Error: Cannot create tmp dir in current dir, please check webserver permissions.';
		respond($response);
	}
}

/**
 * Check exec and ALPR command
 */
if( ! function_exists("exec")){
	$response['error']= 'Error: php exec not available, safe mode?';
	respond($response);
}

//run the command and send me the result
$result  = exec('alpr --version', $myresponse);

// var_dump($myresponse);

// if( empty(run('alpr --version')) ){
// 	$response['error']= 'Error: alpr command not found, is it installed and in your PATH?';
// 	respond($response);
// }

/**
 * Check POSTED data.
 */
// if( empty($_POST['image']) ){
// 	$response['error']= 'Error: No image data recieved. Please send a base64 encoded image';
// 	respond($response);
// }

$image = base64_encode('check.jpeg');

/**
 * Save image to disk (tmp)
 */
// if( ! file_put_contents('tmp'.DS.'check.jpg', base64_decode($image) ) ){
// 	$response['error']= 'Error: Failed saving image to disk, please check webserver permissions.';
// 	respond($response);
// }

/**
 * Run ALPR command on image
 */
$result = run('alpr --country us --json tmp'.DS.'check.jpg');


/**
 * Remove image
 */
// unlink('tmp'.DS.'check.jpg');

/**
 * Check result.
 */
if( empty( $result[0] ) ){
	$response['error']= 'Error: ALPR returned no result';
	respond($response);
}

//Add results to response
$response['data'] = json_decode( $result[0], TRUE);

//Respond with results
respond($response);

/**
 * Aux functions
 */

//Sets headers and responds json
function respond($response){
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: application/json');

	$response = '{"version":2,"data_type":"alpr_results","epoch_time":1541521162954,"img_width":750,"img_height":445,"processing_time_ms":497.312958,"regions_of_interest":[],"results":[{"plate":"LR33T","confidence":85.089302,"matches_template":0,"plate_index":0,"region":"","region_confidence":0,"processing_time_ms":225.353622,"requested_topn":10,"coordinates":[{"x":281,"y":209},{"x":413,"y":209},{"x":413,"y":273},{"x":281,"y":273}],"candidates":[{"plate":"LR33T","confidence":85.089302,"matches_template":0},{"plate":"LR33","confidence":76.970161,"matches_template":0},{"plate":"LR3T","confidence":69.256920,"matches_template":0},{"plate":"LR3ST","confidence":69.166977,"matches_template":0},{"plate":"LRS3T","confidence":68.142403,"matches_template":0},{"plate":"LR3S","confidence":61.047825,"matches_template":0},{"plate":"LRS3","confidence":60.023251,"matches_template":0},{"plate":"LRST","confidence":52.310009,"matches_template":0},{"plate":"LRSST","confidence":52.220070,"matches_template":0},{"plate":"LRSS","confidence":44.100918,"matches_template":0}]}]}';

	$array = json_decode($response);

	$version = $array->{'epoch_time'};

	$results  = $array->{'results'};

	if(empty($results))
	{
		echo 'No plate found';
	}
	else {
		var_dump($results);
		$plateNumber = $results[0]->{'plate'};
		echo "Plat number " . $plateNumber;
	}

	// echo json_encode($response);
	// echo json_encode($array);
	// echo $response;
	exit;
}

//Runs command and returns output
function run($command){
	$output = array();
	exec($command,$output);
	return $output;
}
?>
