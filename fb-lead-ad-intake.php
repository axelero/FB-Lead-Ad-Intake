<?php

/*

Intake Process:

1) Facebook sends Lead metadata to Intake Service
2) Intake Service processes Lead metadata
3) Intake Service sends GET request to Facebook to retrieve Lead data
4) Facebook returns Lead data
5) Intake Service processes Lead data

*/

// ----- STEP 1 ----- //
// Facebook sends metadata as a JSON string - This turns it into PHP
// array, which is easier to work with. 
$input = json_decode(file_get_contents('php://input'), true);


// ----- STEP 2 ----- //
// Traverse $input array to find leadgen_id.
// Facebook sends all Leads since last push, which requires a foreach
// loop to process each lead individually.
// See lead-metadata-example.json for the structure of this array
foreach($input['entry'] as $entry) {
	foreach($entry['changes'] as $leads) {

		
		$lead_id = $leads['value']['leadgen_id'];

		// See README to learn how to get a Token that never expires
		$token = FACEBOOK_TOKEN_GOES_HERE;


		// ----- STEP 3 ----- //
		// Build a URL to request lead data from Facebook
  		$url = 'https://graph.facebook.com/v2.8/';
  		$url .= $lead_id;
  		$url .= '?access_token=' . $token;

  		// open curl connection
		$ch = curl_init();
		// set url
		curl_setopt($ch,CURLOPT_URL, $url);
		// return the response as a string instead of outputting it
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		// execute request and store response in variable
		$lead = curl_exec($ch);
		// close connection
		curl_close($ch);


		// ----- STEP 4 ----- //
		// Facebook response with a JSON string - This turns it into a
		// PHP array, which is easier to work with.
		$lead = json_decode($lead, true);

		// ----- STEP 5 ----- //
		// Traverse $lead array and store lead data in a more
		// managable $data array. This code assumes there is only one
		// value per field. To store an array of values per field
		// remove [0] from $field['values'][0]
		// See lead-data-example.json for the structure of this array
		$data = array();
		foreach($lead['field_data'] as $field) {

			$field_name = $field['name'];
			$data[$field_name] = $field['values'][0];

		}

		// DO SOMETHING WITH $data ARRAY
		
		// I store lead data in a local database and send the data to
		// an external CRM.

	}
}