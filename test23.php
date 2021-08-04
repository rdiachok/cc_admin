<?php
$response = $client->setRawData($xml, 'text/xml')->request('POST');
				}
				else
				{
					//we send a massedge!!!
					return 'error';
					}
				}
				$result = $response -> getBody();
				$simple = "$result";
				$p = xml_parser_create();
				xml_parse_into_struct($p, $simple, $vals, $index);
				xml_parser_free($p);
					
					//print_r($vals);
					foreach ($vals as $key => $v1) {
							
					if($v1['tag'] !== FALSE && isset($v1['tag']) && $v1['tag'] == 'SERVTYPENAME' && in_array($v1['value'], array('DSL доступ', '4') ))
					{
						$intType = $v1['value'];
						$key_2 = $key + 6;
						$status_id = $vals[$key_2]['value'];
						$key_2 = $key + 12;
						$numberOfContract = $vals[$key_2]['value'];
						$key_2 = $key + 20;
						$intLofin = $vals[$key_2]['value'];
						$key_2 = $key + 24;
						$intTP = $vals[$key_2]['value'];
						$par = implode( LOG_SEPARATOR, array($status_id, $intLofin, $intTP, $intType, $numberOfContract) );
							
							return $par;
							
						}
						else
						{
							//thera are our blocked and without intrnet users
							}
						
					
						
						
				}
	}
			else
				{
					//we send a massedge!!!
					return 'error';
					}