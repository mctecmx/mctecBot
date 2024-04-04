<?php
$botToken = "5391493423:AAH-E7-h_ahDQFyl9O5swLjx_zGOh9xxkBg";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update ["message"]["chat"] ["id"];
$message = $update ["message"] ["text"];
$lastname = $update ["message"] ["from"]["last_name"];

switch($message)
{
	case"ID":
		funcionid($chatId);
		break;
	case "Soporte":
		funcionsoporte ($chatId);
		break;
	default:
		menuprincipal($chatId);
		break;
}

function enviarmensaje($chatId, $mensaje)
{
	$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&parse_mode=HTML&text=$mensaje";
	file_get_contents($url);
}
	
function funcionid($chatId)
{
	$mensaje="Tu ‹b>Chat_ID</b> es:%0A<b>" $chatId."</b>";
	enviarmensaje($chatId,$mensaje);
}

function funcionsoporte($chatId)
{
	$mensaje = "Soporte tecnico:%0A mail:showroom@mctec.mx%0AContacto:44";
	enviarmensaje($chatId,$mensaje);
}

function noentiendo($chatId)
{
	$mensaje = "No te entiendo, ¿Puedes repetirlo?";
	enviarmensaje($chatId,$mensaje);
}

function menuprincipal($chatId)
{
	$mensaje = "Hola, soy <b>MCTecBot<b> y te puedo indicar tu ID%0ALo necesitas para que te pueda enviar alertas";
	enviarmensaje($chatId,$mensaje);
}
?>