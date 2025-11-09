@include('include.header')


<div class="container py-5">

    <div class="about-card mx-auto col-lg-8 text-center">
        <i class="fa-solid fa-circle-user profile-icon mb-3"></i>

        <h1 class="fw-bold mb-3">About Me</h1>

        <p class="lead">
            Hi! My name is <strong>Rishabh Jain</strong> from <strong>Prayagraj</strong>.
            This entire web application is designed & developed by me with dedication and hard work.
            I’m thankful to <strong>Deena Sir</strong> for always guiding and supporting me through this project.
        </p>

        <hr class="my-4 text-light">

        <div class="row g-4 mt-3">

            <!-- Developer -->
            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fa-solid fa-laptop-code"></i>
                    <h5 class="mt-2">Developer</h5>
                    <p class="small text-secondary">Designed & built the full system.</p>
                </div>
            </div>

            <!-- Location -->
            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h5 class="mt-2">From</h5>
                    <p class="small text-secondary">Prayagraj, Uttar Pradesh</p>
                </div>
            </div>

            <!-- Guide -->
            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fa-solid fa-user-tie"></i>
                    <h5 class="mt-2">Guide</h5>
                    <p class="small text-secondary">Thanks to Deena Sir</p>
                </div>
            </div>
        </div>
    </div>

</div>
@include('include.footer')
