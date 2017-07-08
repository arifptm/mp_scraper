@foreach ($cities->chunk(10) as $chunk)
<div class="col-sm-4">
    <div class="row directory-block">      
        <div class="col-sm-12">
            <ul>
            @foreach ($chunk as $city)       
                <li>{{ $city->name }}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endforeach
