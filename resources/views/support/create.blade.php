@extends('panel.layouts.app')

@section('content')
@include('layouts.popup')
<main class="offset-md-4 offset-xl-2 col-12 col-md-8 col-xl-10 row" id="home">
    <div class="col-12 col-md-12 col-xl-8 box-grid">
        <div class="box">
            <div class="head">
                <h3>Demande d'assistance</h3>
            </div>
            <div class="content">
                <form method="POST" action="{{ route('assistance.store') }}">
                    @csrf
                     @if (isset($type))
                        <div class="form-group">
                            <label for="type_id">Type de demande</label>
                            <select class="form-control" id="type_id @error('type_id') is-invalid @enderror" name="type_id">
                                @foreach ($types as $new)
                                    <option
                                    value="{{ $new->id }}"
                                    {{ $new->id == $type->id ? "selected" : "" }}
                                    >{{$new->title}}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @else
                    <div class="form-group">
                        <label for="type_id">Type de demande</label>
                        <select class="form-control" id="type_id @error('type_id') is-invalid @enderror" name="type_id">
                            @foreach ($types as $type)
                                <option
                                value="{{ $type->id }}"
                                {{ old('type_id') == $type->id ? "selected" : "" }}
                                >{{$type->title}}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="priority">Priorité</label>
                        <select class="form-control" id="priority @error('priority') is-invalid @enderror" name="priority">
                            <option value=1 >Peu urgente</option>
                            <option value=5 selected>Normale</option>
                            <option value=10 >Urgente</option>
                        </select>
                        @error('priority')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="object">Objet (description courte)</label>
                        <input id="object" type="text" class="form-control @error('object') is-invalid @enderror" name="object" value="{{ old('object') }}" autocomplete="object" autofocus>
                        @error('object')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="content">Description de la demande</label>
                        <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-grad form-sub">
                        <img alt="Start button" src="{{asset('images/panel/send.svg')}}" />
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
