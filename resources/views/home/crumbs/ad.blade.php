@if( $data['location'] == 1 )
    <div class="ad whitebg"><img src=" {{asset('/home/images/longad.jpg')}}"></div>
@elseif($data['location'] == 2 )
    <div class="ad whitebg imgscale">
        <ul><a href="/"><img src=" {{asset('/home/images/ad02.jpg')}}"></a></ul>
    </div>
@endif


