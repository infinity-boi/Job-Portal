<x-public>
@push('css')
  <!-- icheck bootstrap -->
    <link rel="stylesheet"
          href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  @endpush
  
  @section('title', 'Reset Password')
  @section('body-class', 'login-page')
  
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ url('') }}"
           class="h1">{{ config('app.name') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        <form method="POST"
              action="{{ route('password.email') }}">
          @csrf
          <div class="input-group mb-3">
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ __('E-Mail Address') }}"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit"
                      class="btn btn-primary btn-block">Request new password
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="{{ route('login') }}">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</x-public>