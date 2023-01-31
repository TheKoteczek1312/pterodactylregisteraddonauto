<html>

<head>
  <title>{{ config('app.name') }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="robots" content="noindex">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/favicons/manifest.json">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
  <link rel="shortcut icon" href="/favicons/favicon.ico">
  <meta name="msapplication-config" content="/favicons/browserconfig.xml">
  <meta name="theme-color" content="#0e4688">
  <link rel="stylesheet" href="/modules/register/css/register.css">


</head>
<body class="bg-neutral-900">
  <div id="app">
    <div class="sc-14ayc3f-1 cgXlJi" style="height: 2px;"></div>
    <div class="sc-2l91w7-0 kDhnAT">
      <div class="pt-8 xl:pt-32">
        <div class="cyh04c-0 duHJKB">
          <h2 class="cyh04c-1 emoCVo">Formulário de Registro</h2>



@if(isset($post_res))
  <?php
		$res = explode('ion.', $post_res);
		if(isset($res['1'])){
      $submitted = "error";
			$res = "O endereço de e-mail ou o nome de usuário já existem.";

		} else {
      $submitted = "success";
			$res = "Sua conta foi registrada, por favor, verifique seu e-mail para fazer login.";
		}
	?>


  {{-- Form Submit HTML Response --}}

@isset($submitted) 
@if($submitted == "success")
<div class="cyh04c-2 fNCLyU">
            <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt" style="background: #14ac14; border: none;">
            <span class="sc-1yg9bob-2 endIRo title" style="background: #0000002b; border: none;">Success</span>
            <span class="sc-1yg9bob-3 knvREb">{{ $res }}</span>
</div></div> @endif
@if($submitted == "error")
<div class="cyh04c-2 fNCLyU">
            <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt">
            <span class="sc-1yg9bob-2 endIRo title">Error</span>
            <span class="sc-1yg9bob-3 knvREb">{{ $res }}</span>
</div></div>

@endisset @endif 


@endif



      <div class="row">
        <div class="col-xs-12">
          @if (count($errors) > 0)

              @foreach ($errors->all() as $error)

            <div class="cyh04c-2 fNCLyU">
            <div role="alert" class="sc-1yg9bob-0 sc-1yg9bob-1 brfJKd hEbrIt">
            <span class="sc-1yg9bob-2 endIRo title">Error</span>
            <span class="sc-1yg9bob-3 knvREb">{{ $error }}</span>
            </div></div>

              @endforeach

          @endif
          @foreach (Alert::getMessages() as $type => $messages)
          @foreach ($messages as $message)
          <div class="alert alert-{{ $type }} alert-dismissable" role="alert">
            {!! $message !!}
          </div>
          @endforeach
          @endforeach
        </div>
      </div>



          <form action="{{ route('auth.register.url') }}" method="POST" class="qtrnpk-0 ctVkDO">

            <div class="cyh04c-3 jbDTOK">

              <div class="cyh04c-6 dFeVmo">

                <div>
                  <label class="g780ms-0 dlUeSf">Endereço de Email</label>
                  <input name="registration_email" type="email" class="sc-19rce1w-0 hmhrLa" value="" placeholder="exemplo@gmail.com" required>
                </div>

                <div>
                  <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">Usuario</label>
                  <input name="registration_username" type="text" class="sc-19rce1w-0 hmhrLa" value="" placeholder="Usuario" required>
                </div>

                <div>
                  <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">Primerio Nome</label>
                  <input name="registration_firstname" type="text" class="sc-19rce1w-0 hmhrLa" value="" placeholder="Primerio Nome" required>

                  <div>
                    <label class="g780ms-0 dlUeSf qtrnpk-1 cZROhH">Sobrenome</label>
                    <input name="registration_lastname" type="text" class="sc-19rce1w-0 hmhrLa" value="" placeholder="Sobrenome" required>
                  </div>
                </div>



                <div class="qtrnpk-2 eWHATQ">
                  {!! csrf_field() !!}
                  <button type="submit" class="sc-1qu1gou-0 gzrAQh"><span class="sc-1qu1gou-2">Registrar</span></button></div>
                <div class="qtrnpk-3 fCEexJ"><a class="qtrnpk-4 fFWwUW" href="/auth/login">Ja é Registrado?</a></div>
              </div>
            </div>
          </form>


          <p class="cyh04c-7 fFcOT">© 2022 - 2023&nbsp;<a rel="noopener nofollow noreferrer" href="https://github.com/CatValentine-Dev" target="_blank" class="cyh04c-8 emCXNB">TemuxOS Software</a></p>
        </div>
      </div>
    </div>
  </div>
  <div style="visibility: hidden; position: absolute; width: 100%; top: -10000px; left: 0px; right: 0px; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0;">
    <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.5;"></div>
  </div>
</body>
</html>
