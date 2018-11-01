@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    <div>
        <a href="{{ url('users/'.$user->id.'/edit') }} " class="btn btn-primary">
            {{ __('Edit') }}
        </a>

        @component('components.btn-delete')
            @slot('controller', 'users')
            @slot('id', $user->id)
            @slot('name', $user->title)
        @endcomponent
    </div>

    <div class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dt class="col-md-10">{{ $user->id }}</dt>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dt class="col-md-10">{{ $user->name }}</dt>
        <dt class="col-md-2">{{ __('E-Mail Address') }}</dt>
        <dt class="col-md-10">{{ $user->email }}</dt>    
    </div>
    {{-- user post view --}}
    <h2>{{ __('Posts') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Body') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>
                
                    {{-- 記事の編集・削除ボタンのカラム　--}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->posts as $post)
                    <tr>
                        <td>
                            <a href="{{ url('posts/' . $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td nowrap>
                            <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">
                                {{ __('Edit') }}
                            </a>
                            @component('components.btn-delete')
                                @slot('controller' , 'posts')
                                @slot('id' , $post->id)
                                @slot('name', $user->title)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $user->posts->links() }}
</div>
@endsection