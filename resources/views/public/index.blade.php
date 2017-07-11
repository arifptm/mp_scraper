@extends('public.theme.master_layout')

@section('title')
Katalog produk dan seller marketplace indonesia
@endsection

@section('main')
<div class="row directory">
    <div class="col-sm-12 ">
        <h2><span>Daftar Kategori</span></h2>
    </div>
</div>

<div class="row directory">
    <div class="col-xs-12">
        @foreach($categories as $category)
            <div class="directory-block col-sm-4 col-xs-6">
                <div class="row">
                    <a href="/itm/ca/{{ $category->slug}}">
                        <div class="col-sm-3">
                            <i class="fa fa-{{ $category->icon }}"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $category->name }}</h4>
                        </div>        
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('public.block.listing')

@endsection


@section('right')
<br class="hidden-sm hidden-xs">
<br class="hidden-sm hidden-xs">
<br class="hidden-sm hidden-xs">

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-12  col-lg-11 pull-right" >
        <div style="background-color: #ddd;height:200px;margin-bottom:30px;"></div>
    </div>

    <div class="col-xs-12 col-sm-5 col-md-12  col-lg-11 pull-right">
        <div class="panel panel-default">


                        <div class="panel-body" style="height: 102px; display: block;">

                            <div class="fb-like fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/" data-width="265" data-layout="standard" data-action="like" data-show-faces="false" data-share="false" style="display: block; height: 30px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=261&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=standard&amp;locale=en_GB&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=265"><span style="vertical-align: bottom; width: 265px; height: 28px;"><iframe name="f1db9b77b85b1a4" width="265px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FXBwzv5Yrm_1.js%3Fversion%3D42%23cb%3Df286040f992475c%26domain%3Dtemplates.expresspixel.com%26origin%3Dhttp%253A%252F%252Ftemplates.expresspixel.com%252Ff272cb09871af4c%26relation%3Dparent.parent&amp;container_width=261&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=standard&amp;locale=en_GB&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=265" style="border: none; visibility: visible; width: 265px; height: 28px;" class=""></iframe></span></div>
                            <br>
                            <!-- Place this tag where you want the +1 button to render. -->
                            <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 24px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1499740972327" name="I0_1499740972327" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;annotation=inline&amp;width=300&amp;height=30&amp;origin=http%3A%2F%2Ftemplates.expresspixel.com&amp;url=http%3A%2F%2Ftemplates.expresspixel.com%2Fbootlistings%2Findex.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.0v_3Mrbs2Mw.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMPIPQ446UAo7_guFQaxpH994u6LA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1499740972327&amp;parent=http%3A%2F%2Ftemplates.expresspixel.com&amp;pfname=&amp;rpctoken=57344906" data-gapiattached="true" title="+1"></iframe></div>

                            <!-- Place this tag after the last +1 button tag. -->
                            <script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </div>
                        <div class="panel-footer">
                            <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-follow-button twitter-follow-button-rendered" title="Twitter Follow Button" src="http://platform.twitter.com/widgets/follow_button.bac917c749f65aefd5f37c272c7c3538.en.html#dnt=true&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=twitterapi&amp;show_count=true&amp;show_screen_name=true&amp;size=m&amp;time=1499740972835" style="position: static; visibility: visible; width: 216px; height: 20px;" data-screen-name="twitterapi"></iframe>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
        </div>
        <p class="main_slogan" style="margin: 28px 0">Currently listing 355,785 classified ads in the United Kingdom.</p>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >
        <div class="panel panel-default">
            <div class="panel-heading">Premium listings</div>
            <div class="panel-body">
                <div class="featured-gallery">
                    <div class="row">
                        @foreach ($items as $item)                       
                        <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top" title="Jual {{ $item->title }} seharga {{ $item->sell_price }}">
                            <a href="/{{ $item->slug }}" class="">
                                <img alt="" src="{{ str_replace('/rawimage/','/s-400-280/', explode('|', $item->images)[0]) }}" >
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection