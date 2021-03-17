@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('assistance.store') }}">
                        @csrf
                        @if (isset($type))
                            <input name="type_id" value="{{$type->id}}" hidden>
                        @else
                        <div class="form-group row">
                            <label for="type_id" class="col-md-4 col-form-label text-md-right">Priorité</label>
                            <div class="col-md-6">
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
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="priority" class="col-md-4 col-form-label text-md-right">Priorité</label>
                            <div class="col-md-6">
                                <input id="priority" type="integer" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}" autocomplete="priority" autofocus>
                                @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="object" class="col-md-4 col-form-label text-md-right">Object</label>
                            <div class="col-md-6">
                                <input id="object" type="text" class="form-control @error('object') is-invalid @enderror" name="object" value="{{ old('object') }}" autocomplete="object" autofocus>
                                @error('object')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    SEND
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
