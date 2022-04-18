<?php
function fDcwh($pTitle, $pDesc, $pFooterText, $pCustomMessage, $pHex) { 
  	include '/home/admin/domains/web-staging.heavennodes.com/public_html/db.php';
  	$webhookurl = $dcwh;
	$timestamp = date("c", strtotime("now"));
    $json_data = json_encode([
        "content" => $pCustomMessage,
        "username" => "Captain Hook",
      	"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",
        "tts" => false,
        "embeds" => [
            [
                "title" => $pTitle,
                "type" => "rich",
                "description" => $pDesc,
                "timestamp" => $timestamp,
                "color" => hexdec( $pHex ),
                "footer" => [
                    "text" => $pFooterText,
                    "icon_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=375"
                ]
            ]
        ]

    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );
    return curl_close( $ch );
    echo ($pTitle);
}