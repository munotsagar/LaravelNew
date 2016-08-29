<?php
	echo "JSON PAGE";
	$data = array("name" => "Hagrid", "age" => "36");                                                                    
	//$data_string = json_encode($data);
	//print_r($data_string);exit;
	$data_string = '{
    "actor": {
        "mbox": "mailto:demosagar@test.com",
        "name": "Sagar New Created ddd",
        "objectType": "Agent"
    },
    "verb": {
        "id": "http://adlnet.gov/expapi/verbs/answered",
        "display": {
            "en-US": "answered"
        }
    },
    "object": {
        "id": "http://adlnet.gov/expapi/activities/example",
        "definition": {
            "name": {
                "en-US": "Example Activity"
            },
            "description": {
                "en-US": "Example activity description"
            }
        },
        "objectType": "Activity"
    }
}';                                                                                   
																														 
	$ch = curl_init('http://ec2-54-226-70-79.compute-1.amazonaws.com/ilrs/xapi/statement');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',                                                                                
		'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
																														 
	$result = curl_exec($ch);
	
	print_r($result);
	
?>