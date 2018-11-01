@php
    $title = $post->title;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    <div>
        <a href="{{ url('posts/'.$post->id.'/edit') }} " class="btn btn-primary">
            {{ __('Edit') }}
        </a>

        @component('components.btn-delete')
            @slot('controller', 'posts')
            @slot('id', $post->id)
            @slot('name', $post->title)
        @endcomponent
    </div>

    <dl class="row">
    
        <dt class="col-md-2">{{ __('Author') }}</dt>
        <dd class="col-md-10">
            <a href="{{ url('users/' .$post->user->id) }}">
                {{ $post->user->name }}
            </a>
        </dd>

        <dt class="col-md-2">{{ __('Created') }}</dt>
        <dd class="col-md-10">
            <time itemprp="dateCreated" datetime="{{ $post->created_at }}">
                {{ $post->created_at }}
            </time>
        </dd>

        <dt class="col-md-2">{{ __('Updated') }}</dt>
        <dd class="col-md-10">
            <time itemprp="dateModified" datetime="{{ $post->updated_at }}">
                {{ $post->updated_at }}
            </time>
        </dd>
    </dl>
    <hr>
    <div id="post-body">
        {{ $post->body }}
    </div>
</div>
@endsection