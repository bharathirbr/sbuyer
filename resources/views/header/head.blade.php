<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title> @if (Request::segment(1) == '')
           Sbuyer
           @else
                    @if (@Request::segment(1) != '' || @Request::segment(2) != '' || @Request::segment(3) != '' || @Request::segment(4) != '')
                         @if (@Request::segment(4) != '') 
                                {{ @Request::segment(1) }} / {{ @Request::segment(2) }} / {{ @Request::segment(3) }} / {{ @Request::segment(4) }}
                         @endif
                         @if (@Request::segment(3) != '') 
                          {{ @Request::segment(1) }} / {{ @Request::segment(2) }} / {{ @Request::segment(3) }}
                         @endif
                         @if (@Request::segment(2) != '') 
                          {{ @Request::segment(1) }} / {{ @Request::segment(2) }} 
                         @endif
                          @if (@Request::segment(1) != '') 
                          @if(count(@$static_pages_seo) > 0)
                          {{ @$static_pages_seo[0]->metatitle }}
                          @else
                          {{ @Request::segment(1) }}
                          @endif
                         @endif
                    @endif
  	       @endif</title>
  <link rel="shortcut icon" href="{{{ asset('public/images/favicon/favicon-96x96.png') }}}">
<!-- load css files -->

 {!! HTML::style('public/css/style.css'); !!}
 <!-- include the BotDetect layout stylesheet -->
  <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
 <!--  <link rel="stylesheet/less" type="text/css" href="{{URL::asset('public/less/style.less')}}"> -->  
  <link rel="stylesheet/less" type="text/css" href="{{URL::asset('public/less/responsive.less')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/jquerysctipttop.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/Roboto.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/jquery.countdownTimer.css')}}">
  <script type="text/javascript" src="{{URL::asset('public/js/less/config.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('public/js/less/less.js')}}"></script>
  <!--<link rel="stylesheet" href="css/style.css">-->
 <!--  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
 <!--  <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap-responsive.min.css')}}"> -->
 <!--  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->   
 <!--   <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap-responsive.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap-responsive.min.css')}}"> -->


<!-- @if (Request::segment(1) == 'login' || Request::segment(1) == '')

@endif -->

<!-- @if (Request::segment(1) == '')
 {!! HTML::style('public/css/style.css'); !!}
@endif -->


<!-- {!! HTML::script('public/css/style-RTL.css'); !!}
{!! HTML::script('public/css/owl.carousel.css'); !!}
{!! HTML::script('public/css/jquery.bxslider.css'); !!}
{!! HTML::script('public/css/font-awesome.css'); !!}
{!! HTML::script('public/css/chosen.css'); !!}
{!! HTML::script('public/css/animate.css'); !!} -->
<!-- {!! HTML::style('public/css/bootstrap.css'); !!} -->

