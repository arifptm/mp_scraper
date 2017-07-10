    @include('public.theme.c_top')
    @include('public.theme.content')
    @include('public.theme.c_bottom')

        <div class="container">    
        <div class="row">
            <div class="col-sm-12 col-md-8">
               @include('main')
            </div>

            <div class="col-xs-12 col-md-4 " >
                @include('right')
            </div>
        </div>
    </div>