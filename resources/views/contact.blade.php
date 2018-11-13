<!doctype html>
<html>
<head>
    @include('header.head')
</head>
<body class="cms-index-index index-opt-1">
    <div class="wrapper">
                @include('header.header')
        <!-- MAIN -->
        <main class="site-main"> 

             <!-- breadcrumb -->
            <div class="container breadcrumb-page">
                <ol class="breadcrumb">
                    <li><a href="#">Home </a></li>
                    <li class="active">Contact</li>
                </ol>
            </div>
             <!-- breadcrumb -->

 <!-- contact page  start -->
    <!-- MAIN -->   
            <div class="container">
                <div class="block-googlemap">
                    <div style="width: 1170px; height: 500px;">
                         {!! Mapper::render() !!}
                    </div>
                   <!-- {{ HTML::image('public/images/media/index1/map.jpg','map',array('class'=>'')) }} -->
                </div>

                <div class="row">
                    <div class="col-md-8">

                        <!-- block  contact-->
                        <div class="block-contact-us">
                            <div class="block-title">
                                contact us
                            </div>
                             @if (Session::has('contact_success_message'))                                 
                                        <label class="error"> {{ Session::get('contact_success_message') }} </label>                                 
                             @endif

                            <form name="contact_form" id="contact_form"  action="{!! url('contact'); !!}" method="post" class="contact_form">
                                {{ csrf_field() }}
                            <div class="block-content row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name *" class="form-control" id="name" value="{{ old('name') }}" >
                                    </div>

                                     @if (@$errors->has('name'))
                                         <label class="error">{{ @$errors->first('name') }}</label>
                                      @endif
                                    
                                    <div class="form-group">
                                        <input type="text" placeholder="Email *" name="email" class="form-control" id="email" value="{{ old('email') }}" >
                                    </div>
                                     @if (@$errors->has('email'))
                                         <label class="error">{{ @$errors->first('email') }}</label>
                                      @endif
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject *" name="subject" id="subject" class="form-control" value="{{ old('subject') }}" >
                                    </div>
                                     @if (@$errors->has('subject'))
                                         <label class="error">{{ @$errors->first('subject') }}</label>
                                      @endif

                                    <div class="form-group">
                                        <input type="text" placeholder="phone *" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                     @if (@$errors->has('phone'))
                                         <label class="error">{{@$errors->first('phone') }}</label>
                                      @endif
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                    <textarea placeholder="Message *" rows="1" name="message" class="form-control" id="message" >{{ old('message') }}</textarea>
                                    </div>
                                     @if (@$errors->has('message'))
                                         <label class="error">{{ @$errors->first('message') }}</label>
                                      @endif


                                <div class="form-group">
                                    <label>Retype the characters from the picture</label>
                                    {!! captcha_image_html('ContactCaptcha') !!}
                                    <input type="text" class="form-control" id="CaptchaCode" name="CaptchaCode" placeholder="Enter captcha">

                                    @if (Session::has('CaptchaCodes'))                                 
                                        <label class="error"> {{ Session::get('CaptchaCodes') }} </label>                                 
                                    @endif
                               </div>



                                    <div class="text-right">
                                        <button class="btn btn-inline" type="submit">send message</button>                               
                                    </div>
                                </div>
                            </div>
                            <!-- block  contact-->
                             </form>
                        </div>
                    </div>

                    <div class="col-md-4">

                         <!-- block  contact-->
                        <div class="block-address">
                            <div class="block-title">
                                address
                            </div>
                            <div class="block-content ">
                                <p>
                                    <b class="title">Address</b>
                                <div>{!!html_entity_decode(@$faqall[1]->address)!!}</div>
                            </div>
                            
                        </div><!-- block  contact-->
                    </div>
                </div>
            </div>

        <!-- end MAIN -->
 <!-- end contact page  -->        
           @include('footer.footer')    
        </main>
    <!-- end MAIN -->    
    </div>      
</body>
</html>