<?php
namespace Letrams\SkupkaClient;

class Client 
{
	public function send($data,$key)
	{
		$ch = curl_init('https://skupka.com/api/v1/blago/new-lead');
		
		$authorization = 'Authorization: Bearer ' . $key;
		curl_setopt($ch, CURLOPT_HTTPHEADER, [$authorization]);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		echo $responce = curl_exec($ch);
		curl_close($ch);	

		return json_decode($responce);
	}
}