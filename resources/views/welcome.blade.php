@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome page</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
					<div class="jumbotron">
					  <h1 class="display-4">Welcome page!</h1>
					  <p class="lead">In order to visit the home page you need to login or register..</p>
					  <hr class="my-4">
					  <p>If you have not registered yet, click on the following link otherwise login to the home page.</p>
					  <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
