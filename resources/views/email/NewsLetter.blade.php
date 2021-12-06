<!DOCTYPE>
<html>
  <head>
    <title>WELCOME</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
    <meta name="format-detection" content="telephone=no" />
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!--<![endif]-->
      <link href="{{asset('/')}}assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
  
  </head>
  <body>
{!! html_entity_decode($demo->email_body, ENT_QUOTES, 'UTF-8') !!} 
  </body>

</html>
