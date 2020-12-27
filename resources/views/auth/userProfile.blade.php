@extends('public.index')

@section('content')
<div class="userProfile">
<!-- Tab links -->
<div class="tab">
    <div class="row">
        <div class="column">
            <button class="tablinks" onclick="openCity(event, 'userinfo')" id="defaultOpen">Profile</button>
        </div>
        <div class="column">
            <button class="tablinks" onclick="openCity(event, 'edit')">Edit</button>
        </div>
      </div>
  
 
</div>

<!-- Tab content -->
<div id="userinfo" style="text-align: center; margin-bottom:50px!important;justify-content:center" class="tabcontent">
    <img src="{{ asset('frontend/assets/default.png')}}" style="height: 80px;width:80px;border-radius:50%" alt="insta4">
  <h1>  {{ Auth::user()->name }}</h1>
  <p>  {{ Auth::user()->email }}</p>   
  <p>
    <a class="logout" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
 </a></p>                 


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

</div>

<div id="edit" class="tabcontent">
  <div class="registerForm">
    <!-- general form elements -->
    

    <form method="POST" action="{{ route('register') }}">
        @csrf
<div class="formpadding">
<h2 style="text-align:center">Profile Edit</h2>

<hr>

<label for="name"><b>Name</b></label>
<input type="text" class="@error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name">
@error('name')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span><br>
@enderror

<label for="email"><b>Email</b></label>
<input type="text" class="@error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span><br>
@enderror


<label for="password"><b>Password</b></label>
<input type="password" class="@error('password') is-invalid @enderror"   value="{{Auth::user()->password }}" name="password">
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror


<label for="password"><b> Confirm Password</b></label>
<input id="password-confirm" type="password" name="password_confirmation"   value="{{ Auth::user()->password }}" required autocomplete="new-password">


<hr>

<button type="submit" class="registerbtn">Sign Up</button>
</div>

<div class="formpadding signin">
    <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
  </div>
</form>
      
</div>
</div>


</div>
@endsection
@push('scripts')
    <script>
       
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;
            
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
          
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
          
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
          }

          document.getElementById("defaultOpen").click();
    </script>
@endpush