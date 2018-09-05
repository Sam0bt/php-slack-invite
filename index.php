<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

		<meta charset="UTF-8">
	</head>
    <style>
    .bilgi {
        
            margin-buttom:6px;
        }
	</style>
	<body style="background-color: #252525; width: 100%">
		<div style="text-align: center; margin-top: 75px">
			<div>
				<img src="http://samibabat.com/project/slack/invite/logo.png"/>
			</div><br><br>
			<h2 style="font-family: 'Roboto', sans-serif; color: #ffffff">Pisi Linux Geliştirici takımına Katılmak İçin E-Mail Adresinizi Giriniz:</h2>
			
		<form class="pure-form" method="post" action="?veri=gonder">
    <fieldset>
        <legend></legend>
<br>
        <input type="email" name="email" size="50" placeholder="Email Adresiniz">


        <button type="submit" class="pure-button pure-button-primary">Takıma Katıl!</button>
    </fieldset>
</form>
	
<?php 
 
	@$email=$_POST["email"];
	$newmail = trim($email);
	@$team =  "TEAM(Subdomain)";
	

	function SlackPost()
	{
		@$email=$_POST["email"];
		@$newmail = trim($email);
		$ch = curl_init(); // oturum baslat
	// POST  adresi

	curl_setopt($ch, CURLOPT_URL,"https://".@$team."slack.com/api/users.admin.invite?%C02NPT4MB%");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,'email='.$newmail.'&token=TOKEN-API');
	curl_setopt($ch ,CURLOPT_RETURNTRANSFER , True);
		$replyRaw = curl_exec($ch);


	            $reply=json_decode($replyRaw,true);
	          
	            if($reply['error']==invalid_email) 
                        {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'E-mail Adresini yazmayı unuttun!';
	                    echo '</p>';                                                    
                        }
                        elseif($reply['error']==already_in_team) 
                        {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'Pisi Slack Kanalına Zaten Üyesin! <a class="pure-button pure-button-primary" href=https://pisi.slack.com>Pisi Slack Kanalına Git.</a>';
	                    echo '</p>';                                                    
                        }
                     elseif($reply['error']==already_invited) 
                        {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'Daha önce kayıt olmuşsunuz! Lütfen Kayıt olduğunuz e-posta ile  <a class="pure-button pure-button-primary" href=https://pisi.slack.com>Pisi Slack Kanalına Giriş yapın.</a>';
	                    echo '</p>';                                                    
                        }    
	            
	            elseif($reply['ok']==false) {
		            	echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'Hata Oluştu, Tekrar Deneyin!';
	                    echo '</p>';
	                } else
	                {
	                
	                echo '<p style="font-family: \'Roboto\', sans-serif; color: #9d3d3d">';
	                    echo 'Başarıyla Üye oldunuz. <b color=white>'.$newmail.'</b> Adresinde Davet için Mail Gönderdik. Lütfen E-mailinizi kontrol ediniz.';
	                    echo '</p>';
	                
	                
	                }
$file2 = file("log/result.log");
$count = count($file2);
$log = fopen("log/result.log", "a");
fwrite($log,  "".$count." | ".date('d.m.Y  H:i:s', 1375057836)." | ".$newmail." | ".$replyRaw."\n");
fclose($file); 
curl_close ($ch);

	           
		
	}

	if(@$_GET["veri"]=="gonder")
		 {
		 	SlackPost();
		 }



			/*if ($showform){
					if ($error){
				?>
			
				<p style="font-family: 'Roboto', sans-serif; color: #D2007D">
					Lütfen Tüm Alanları Doldurun!
				</p>
			
			<?php
					}
					
					showForm();
					}
			?>*/

?>
<hr><br>
<p style="font-family: 'Roboto', sans-serif; color: #9d3d3d">
					Takım Hakkında Açıklama
				</p>
