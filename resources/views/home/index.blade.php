@extends('layout')
@section('content')
<section class="mx-10">
    <div id="navbar" class="my-5">
        <ul class="flex gap-1 justify-between">
            <li>
                <div class="flex flex-col">
                    <a href="/" class="text-3xl font-bold font-[Poppins]">ZARKASYA & CO.</a>
                    <p class="text-md">Advocates and Solicitors</p>
                </div>
            </li>
            <section class="flex gap-3 justify-center items-center">
                <li class="font-bold"><a href="{{ url('/') }}">Home</a></li>
                @if(!Auth::check())
                <li class="font-bold"><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li class="font-bold"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="font-bold"><a href="{{ url('/logout') }}">Logout</a></li>

                @endif
            </section>
           </ul>
    </div>
    <hr>
    <section>
        <div id="hero" class="hero flex items-center min-h-screen ">
            <div class="relative flex flex-col items-start">
                <h1 class="text-5xl font-bold">Malaysia's Law Firm
                </h1>
                <h1 class="text-5xl font-bold">For Business</h1>
                <p class="text-xl">Ease through the business life cycle spectrum with peace of mind and confidence</p>
            </div>
        </div>
    </section>
    <section class="flex flex-col mx-auto max-w-5xl gap-10">
        <h1 class="text-5xl text-center underline font-bold">Practice Area</h1>
        <div class="grid grid-cols-2 gap-20 min-h-screen">
            <div>
                <h1 class="text-4xl">Franchising & Licensing
                </h1>
                <p class="text-lg text-justify">We provide comprehensive services for franchising and licensing, including franchise development, franchise/licensing agreements, intellectual property protection, regulatory compliance, and international expansion. We assist clients in navigating legal complexities, ensuring compliance, and maximizing their businesses via franchising/licensing structures. With expertise in diverse industries, we offer tailored solutions to meet specific needs of our clients.</p>
            </div>
            <div>
                <h1 class="text-4xl">Franchising & Licensing
                </h1>
                <p class="text-lg text-justify">Commercial transactions are critical to every successful business. As a corporate law firm, this area remains as our key foundation. Leveraging on our wide-ranging corporate and commercial knowhow, we assist in the review, drafting, negotiation and execution of complex commercial contracts and we strive to protect the best interest of our clients in all transactions.</p>
            </div>
{{--            Mergers & Acquisitions--}}
            <div>
                <h1 class="text-4xl">Mergers & Acquisitions</h1>
                <p class="text-lg text-justify">M&A is one of our bread-and-butter practice areas. With our global reach, commercial awareness, and entrepreneurial spirit, our services span the entire M&A spectrum encompassing pre-deal due diligence, deal structure planning, negotiations, execution of M&A transactions, and post-merger integration strategy – delivering maximum value to our clients.</p>

            </div>
            <div>
                <h1 class="text-4xl">Fundraising & Investments</h1>
                <p class="text-lg text-justify">With our experience in dealing with a variety of funding platforms such as Venture Capital Firms (VCs), and Equity Crowdfunding Platforms (ECFs), we are able to assist our clients in choosing the best deal structure and negotiation strategy which are the key elements to successful fundraising activities.</p>
            </div>
            </div>
    </section>
    <section id="about-us" class="container flex flex-col mx-auto mb-20 max-w-5xl gap-10">
        <h1 class="text-5xl text-center underline font-bold">About Us</h1>
        <div class="flex flex-col gap-5 ">
            <p class="text-lg">The firm was founded in 2021 by our Founder and Managing Partner, Shamil Shakil, a Malaysian qualified corporate lawyer and company secretary.</p>
            <p class="text-lg">The firm has represented businesses and entities of all sizes from diverse industries both locally and globally including startups, small and medium-sized enterprises (SMEs), societies and associations, cooperatives as well as large corporations on high-value and complex corporate matters especially on issues involving cross-border transactions, regulatory compliance, fintech, and offshore dealings.</p>
            <p class="text-lg">Messrs. Zarkasya is an innovative and forward-thinking boutique corporate law firm headed by two solution-driven partners providing an extensive range of legal services including Corporate Advisory & Strategic Development, Franchising & Licensing, Fundraising & Investments, Fintech, Technology & Blockchain, Mergers & Acquisitions, and Transactions & Contracts.</p>
            <p class="text-lg">Leveraging on our depth of experience and skills, we aim to provide clients with pragmatic, creative and commercially sound legal solutions assisting them in navigating business uncertainties and the ever-changing regulatory environment.</p>

        </div>
    </section>
    <section id="contact-us" class="container flex flex-col h-96 mx-auto max-w-5xl gap-10">
        <h1 class="text-5xl text-center underline font-bold">Contact Us</h1>
        <p class="text-xl text-center max-w-3xl mx-auto ">
            Messrs. Zarkasya, A-7-9, <br/>Menara Prima
            Jalan PJU 1/39,<br/>Dataran Prima<br/>
            47301 Petaling Jaya
            Selangor, Malaysia
            <br/>03 7886 4515
        </p>
    </section>

</section>
@endsection
