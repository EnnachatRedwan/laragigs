<section class="relative h-72 flex flex-col justify-center align-center text-center space-y-4 mb-4"
    style="background-image: linear-gradient(180deg,rgb(0,228,255),rgb(0, 183, 255))">
    

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            EN<span class="text-black">Jobs</span>
        </h1>
        <p class="text-2xl text-white font-bold my-4">
            Find or post jobs
        </p>
        <div>
            @if (!auth()->user())
                <a href="/register"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
                    Up to List a Gig</a>
            @endif

        </div>
    </div>
</section>
