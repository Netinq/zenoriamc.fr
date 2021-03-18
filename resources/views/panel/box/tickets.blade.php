<div class="col-12 col-md-12 col-xl-8 box-grid">
    <div class="box ti" id="tickets">
        <div class="head">
            <h3>{{$title}}</h3>
        </div>
        <div class="content">
        @foreach ($tickets as $ticket)
            <div class="table">
                <div class="section">
                    <p>#{{$ticket->id}} {{$ticket->object}}</p>
                    <div class="tags">
                        <div>{{$ticket->type->tag}}</div>
                        <div>{{$ticket->isOpen ? 'en cours' : 'résolu'}}</div>
                    </div>
                </div>
                <div class="section section-end">
                    @if ($ticket->isOpen)
                    <a href="{{route('assistance.show', $ticket->id)}}"><div class="button">
                        <img alt="Arrow" src="{{asset('images/panel/arrow-right.svg')}}">
                    </div></a>
                    @else
                        <img alt="Check" src="{{asset('images/panel/check.svg')}}">
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
