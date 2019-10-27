@include('layouts.header')
<style type="text/css">
  .container {
      margin: 10px;
      text-align: center;
      background-color: #76b852;
  }
    .card {
        margin: 10px;
    }
</style>
<div class="col-md-10 offset-md-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                            </div>
                        @endif

                        Bienvenue Dans le CloudProject {{ Auth::User()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

