<?php
	$inData = getRequestInfo();

	$Contact_ID = $inData[Contact_ID];
	$id = 1;

	$conn = new mysqli("localhost", "fruchtjo_Boa3600", "Dog\$arecool1", "fruchtjo_Project1");
	if ($conn->connect_error)
	{
		returnWithError( $conn->connect_error );
	}
	else
	{
		$sql = "DELETE FROM Contact_Information WHERE ID = '" . $Contact_ID . "'";
		$result = $conn->query($sql);

	if( $result != TRUE )
	{
	    returnWithError( $conn->error );
	}
		$conn->close();
	}

	returnWithInfo($id);

	function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}

	function returnWithError( $err )
	{
		$retValue = '{"error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}

	function returnWithInfo( $id )
	{
		$retValue = '{"id":"' . $id . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}



?>
