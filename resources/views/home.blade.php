@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div class="card-body">
                    <!--@include('layouts.flash-notification')-->
                    <x-alert>
                        <h1>Here is response from Upload </h1>
                    </x-alert>

                    <!--{{session()->forget('message')}}--> <!--To flush Session -->
                   <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image"/>
                        <input type="submit" value="Upload"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
