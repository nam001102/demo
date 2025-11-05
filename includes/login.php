<section class="vh-100 login-bg overflow-hidden">
  <div class="glassContainer text-white border-0 shadow-lg mx-auto" 
           style="border-radius: 1rem; overflow: hidden; max-width: 400px;">
        <div class="card-body p-4 text-center position-relative">

          <!-- Login Form -->
          <div id="loginForm" class="auth-form fade-in">
            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
            <p class="text-white-50 mb-4">Please enter your login and password!</p>

            <div class="form-outline form-white mb-3 d-flex justify-content-center">
              <input type="text" id="loginEmail" placeholder="Username" class="form-control form-control-lg w-75" />
            </div>

            <div class="form-outline form-white mb-4 d-flex justify-content-center">
              <input type="password" id="loginPassword" placeholder="Password" class="form-control form-control-lg w-75" />
            </div>

            <p class="small mb-4 pb-lg-2">
              <a class="text-white-50" href="#!">Forgot password?</a>
            </p>

            <button class="btn btn-outline-light btn-lg px-5 mb-3" type="submit">Login</button>

            <p class="mb-0">
              Don't have an account?
              <a href="#" id="switchToRegister" class="text-white-50 fw-bold">Sign Up</a>
            </p>
          </div>

          <!-- Register Form -->
          <div id="registerForm" class="auth-form fade-out d-none">
            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
            <p class="text-white-50 mb-4">Create your account below!</p>

            <div class="form-outline form-white mb-3 d-flex justify-content-center">
              <input type="text" id="registerUsername" placeholder="Username" class="form-control form-control-lg w-75" />
            </div>

            <div class="form-outline form-white mb-3 d-flex justify-content-center">
              <input type="email" id="registerEmail" placeholder="Email" class="form-control form-control-lg w-75" />
            </div>

            <div class="form-outline form-white mb-3 d-flex justify-content-center">
              <input type="password" id="registerPassword" placeholder="Password" class="form-control form-control-lg w-75" />
            </div>

            <div class="form-outline form-white mb-4 d-flex justify-content-center">
              <input type="password" id="registerConfirm" placeholder="Confirm Password" class="form-control form-control-lg w-75" />
            </div>

            <button class="btn btn-outline-light btn-lg px-5 mb-3" type="submit">Register</button>

            <p class="mb-0">
              Already have an account?
              <a href="#" id="switchToLogin" class="text-white-50 fw-bold">Login</a>
            </p>
          </div>

        </div>
      </div>
</section>


<svg style="display: none">
  <filter id="container-glass" x="0%" y="0%" width="100%" height="100%">
    <feTurbulence type="fractalNoise" baseFrequency="0.008 0.008" numOctaves="2" seed="92" result="noise" />
    <feGaussianBlur in="noise" stdDeviation="0.02" result="blur" />
    <feDisplacementMap in="SourceGraphic" in2="blur" scale="77" xChannelSelector="R" yChannelSelector="G" />
  </filter>
</svg>

