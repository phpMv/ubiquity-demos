<?php
return array(
	"callback"=>"http://127.0.0.1:8090/Auth/login",
	"providers"=>array(
			"Google"=>array(
					"enabled"=>true,
					"force"=>true,
					"keys"=>array(
							"id"=>"613539316283-brhgn1d261smejjc82u2in4fg11r04ap.apps.googleusercontent.com",
							"secret"=>"RNtSuBLFcgt14BfBwQIhXoLl"
							)
					),
			"GitHub"=>array(
					"enabled"=>true,
					"force"=>false,
					"keys"=>array(
							"id"=>"882dcb17e1c77a559456",
							"secret"=>"3573d5d5cafe1070ac47bfe237116015d3d1c447"
							)
					),
			"StackExchangeOpenID"=>array(
					"enabled"=>true,
					"force"=>false
					),
			"Discord"=>array(
					"enabled"=>true,
					"force"=>false,
					"keys"=>array(
							"id"=>700622454221045780,
							"secret"=>"TzC5IPIw9QXeHVE5yF92Qnvind0OfLXr"
							)
					)
			),
	"debug_mode"=>false,
	"debug_file"=>"./oauth.log"
	);