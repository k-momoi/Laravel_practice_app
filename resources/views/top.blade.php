@php
    $title =env('APP_NAME');
@endphp

@extends('layouts.my')
@section('title', 'demo-laravel-crud')
@section('content')
<div class='container'>
    <h1>{{ $title }}</h1>
    <p>
        {{ __('My practice for basic CRUD of Laravel 5.7 on Heroku.') }}
    </p>
    <ul>
        <li>
            Github:
            <a href="https://github.com/k-momoi" target="_blank">
            https://github.com/k-momoi
            </a>
        </li>
    </ul>
    <h2>{{ __('Feature') }}</h2>
    <ul>
        <li>{{ __('All visitors can read all posts.') }}</li>
        <li>{{ __('All visitors can read all users\' profile except email address.') }}</li>
        <li>{{ __('All visitors can sign up.') }}</li>
        <li>{{ __('Each the logged in user can post, edit and delete.') }}</li>
        <li>
            {{ __('The admin can edit delete all users\' accounts and posts.') }}
            <ul>
                <li>
                    {{ __('Admin') }}:
                    <ul>
                        <li>id: 1</li>
                        <li>name: sutara79</li>
                        <li>email: toumin.m7@gmail.com</li>
                        <li>password: 1234</li>
                    </ul>
                </li>
                <li>
                    {{ __('Users') }}:
                    <ul>
                        <li>id: 2</li>
                        <li>name: foo1</li>
                        <li>email: foo1@foo.com</li>
                        <li>password: 1234</li>    
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endsection