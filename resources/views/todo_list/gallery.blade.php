@include('include.header')

<style>
    .gallery-wrapper {
        padding: 50px 0;
        background-color: #f5f5f5;
        min-height: 80vh;
    }

    .gallery-title {
        text-align: center;
        margin-bottom: 40px;
        font-weight: 700;
        color: #333;
    }

    .gallery-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .gallery-card:hover {
        transform: scale(1.05);
    }

    .gallery-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .gallery-card-body {
        padding: 15px;
        text-align: center;
    }

    .gallery-card-body h5 {
        font-size: 16px;
        font-weight: 600;
        color: #555;
    }

</style>

<div class="gallery-wrapper container">
    <h2 class="gallery-title">Kuku Todo Gallery</h2>

    <div class="row g-4">
        @for($i=1; $i<=8; $i++) <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card gallery-card">
                <img src="https://picsum.photos/400/200?random={{ $i }}" alt="Gallery Image {{ $i }}">
                <div class="gallery-card-body">
                    <h5>Image {{ $i }}</h5>
                
                </div>
            </div>
    </div>
    @endfor
</div>
</div>

@include('include.footer')
