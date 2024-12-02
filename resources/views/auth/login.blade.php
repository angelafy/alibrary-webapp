<x-app>

    <body class=" border-top-wide border-primary d-flex flex-column">
        <script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.webp') }}"
                            height="36" alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Login to your account</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" placeholder="Username" autocomplete="off" name="username_or_email"
                                    value="{{ old('username_or_email') }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">
                                    Password
                                    <span class="form-label-description">
                                        <a href="./forgot-password.html">I forgot password</a>
                                    </span>
                                </label>
                                <div class="input-group input-group-flat">
                                    <input type="password" id="password"
                                        class="form-control" name="password"
                                        placeholder="Your password" autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary toggle-password" title="Show password"
                                            data-bs-toggle="tooltip">
                                            <!-- Eye Closed Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-closed"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" style="display:block;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="3" y1="3" x2="21" y2="21" />
                                                <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" />
                                                <path
                                                    d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.666 1.167 -1.333 2.167 -2 3m-2 2a9.55 9.55 0 0 1 -2 1" />
                                                <path
                                                    d="M5.824 5.835a14.646 14.646 0 0 0 -3.824 5.165c2.667 4.667 6 7 10 7c.856 0 1.68 -.11 2.464 -.322" />
                                            </svg>

                                            <!-- Eye Open Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-eye-open"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" style="display:none;">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path
                                                    d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <span class="form-check-label">Remember me on this device</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center text-muted mt-3">
                    Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const togglePasswordBtn = document.querySelector('.toggle-password');
                const eyeClosedIcon = togglePasswordBtn.querySelector('.icon-eye-closed');
                const eyeOpenIcon = togglePasswordBtn.querySelector('.icon-eye-open');

                togglePasswordBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeClosedIcon.style.display = 'none';
                        eyeOpenIcon.style.display = 'block';
                    } else {
                        passwordInput.type = 'password';
                        eyeOpenIcon.style.display = 'none';
                        eyeClosedIcon.style.display = 'block';
                    }
                });
            });
        </script>
        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="{{ asset('assets/js/tabler.min.js?1667333929') }}"></script>
        <script src="{{ asset('assets/js/demo.min.js?1667333929') }}"></script>

    </body>
</x-app>
