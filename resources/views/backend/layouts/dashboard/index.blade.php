@extends('backend.app')

@section('title', 'Dashboard')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <a href="" class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $admins }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Admins</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                        <g data-name="28-Agency">
                                            <path style="fill:#ffee6e" d="M47 11h10v2H47z" />
                                            <path transform="rotate(-29.745 50.5 6)" style="fill:#ffee6e"
                                                d="M46.469 5h8.062v2h-8.062z" />
                                            <path transform="rotate(-60.255 50.5 18)" style="fill:#ffee6e"
                                                d="M49.5 13.969h2v8.062h-2z" />
                                            <path style="fill:#ffee6e" d="M7 11h10v2H7z" />
                                            <path transform="rotate(-60.255 13.5 6)" style="fill:#ffee6e"
                                                d="M12.5 1.969h2v8.062h-2z" />
                                            <path transform="rotate(-29.745 13.499 18)" style="fill:#ffee6e"
                                                d="M9.469 17h8.062v2H9.469z" />
                                            <path
                                                d="m36.707 26.293-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4-.007-.007a.974.974 0 0 0 .006-1.408z"
                                                style="fill:#afb4c8" />
                                            <path style="fill:#b2876d" d="M26 13h4v8h-4z" />
                                            <path style="fill:#966857" d="M28 13h2v8h-2zM27 1v2.73l-4 2.18V1h4z" />
                                            <path style="fill:#b2876d" d="M25 1h-2v4.91l2-1.09V1z" />
                                            <path style="fill:#a3d4ff" d="M33 13h5v4h-5z" />
                                            <path style="fill:#65b1fc" d="M33 15h5v2h-5z" />
                                            <path d="M38 13h-5v4h5zm3-3.09V21H30v-8h-4v8h-3V9.91L32 5z" style="fill:#f7f7f7" />
                                            <path style="fill:#cfcfcf" d="m32 5-9 4.91v2L32 7l9 4.91v-2L32 5z" />
                                            <path style="fill:#ff936b"
                                                d="M27 3.73 32 1l11 6v4l-2-1.09L32 5l-9 4.91L21 11V7l2-1.09 4-2.18z" />
                                            <path style="fill:#ff7045"
                                                d="m32 3-9 4.91L21 9v2l2-1.09L32 5l9 4.91L43 11V9l-2-1.09L32 3z" />
                                            <path d="M43 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                style="fill:#966857" />
                                            <path
                                                d="M53 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3h-3v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#e9edf5" d="M39 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cdd2e1" d="m49 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M49 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM56 33v5h1a2.006 2.006 0 0 0 2-2v-3zM43 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M49 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 56 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M53 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path style="fill:#a3d4ff" d="m50 52-1 6 2 2 2-2-1-6h-2z" />
                                            <path style="fill:#65b1fc" d="m48 50 2 2h2l2-2-3-3-3 3z" />
                                            <path style="fill:#afb4c8"
                                                d="M46.22 45.56 48 50l3-3-2-2-2.78.56zM51 47l3 3 1.78-4.44L53 45l-2 2z" />
                                            <path d="M5 31v2h3c7 0 7-3 7-3a2.938 2.938 0 0 0 3 3h3v-2a8 8 0 0 0-16 0z"
                                                style="fill:#966857" />
                                            <path
                                                d="M15 28a2.938 2.938 0 0 0 3 3h3v2h-3a2.938 2.938 0 0 1-3-3s0 3-7 3H5v-2h3c7 0 7-3 7-3z"
                                                style="fill:#8d5c4d" />
                                            <path style="fill:#9c9c9c" d="M1 47v16h24V47l-10-2-2 2-2-2-10 2z" />
                                            <path style="fill:#cfcfcf" d="m11 45 2 2 2-2 10 2v3l-10-2-2 2-2-2-10 2v-3l10-2z" />
                                            <path
                                                d="M11 42.59V45l2 2 2-2v-2.41a5.083 5.083 0 0 1-4 0zM18 33v5h1a2.006 2.006 0 0 0 2-2v-3zM5 33v3a2.006 2.006 0 0 0 2 2h1v-5z"
                                                style="fill:#faa68e" />
                                            <path
                                                d="M11 42.59a5 5 0 0 0 5.54-1.05A5.022 5.022 0 0 0 18 38v-5a2.938 2.938 0 0 1-3-3s0 3-7 3v5a5.029 5.029 0 0 0 3 4.59z"
                                                style="fill:#ffcdbe" />
                                            <path
                                                d="M15 30a2.938 2.938 0 0 0 3 3v2a2.938 2.938 0 0 1-3-3s0 3-7 3v-2c7 0 7-3 7-3z"
                                                style="fill:#ffbeaa" />
                                            <path
                                                d="M25.2 46.02 16 44.18v-.992A6.007 6.007 0 0 0 18.91 39H19a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 10 43.188v.992L.8 46.02A1 1 0 0 0 0 47v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zM19 37v-3h1v2a1 1 0 0 1-1 1zM6 36v-2h1v3a1 1 0 0 1-1-1zm2-4H6v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 17 33.874V38a4 4 0 0 1-8 0zM13 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zM2 47.819l8.671-1.734L12 47.414V62H2zM24 62H14V47.414l1.329-1.329L24 47.819zM63.2 46.02 54 44.18v-.992A6.007 6.007 0 0 0 56.91 39H57a3 3 0 0 0 3-3v-5a9 9 0 0 0-18 0v5a3 3 0 0 0 3 3h.09A6.007 6.007 0 0 0 48 43.188v.992l-9.2 1.84a1 1 0 0 0-.8.98v16a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V47a1 1 0 0 0-.8-.98zm-14.525.065.915.915-1.221 1.221L47.6 46.3zm3.258 11.572-.933.929-.929-.929.776-4.657h.306zM51.586 51h-1.172l-1-1L51 48.414 52.586 50zm.828-4 .915-.915 1.071.215-.768 1.921zM57 37v-3h1v2a1 1 0 0 1-1 1zm-13-1v-2h1v3a1 1 0 0 1-1-1zm2-4h-2v-1a7 7 0 0 1 14 0v1h-2a1.883 1.883 0 0 1-2-2 1.019 1.019 0 0 0-1-1.023.979.979 0 0 0-1 .966v.015c-.017.11-.414 2.042-6 2.042zm1 1.979c2.99-.129 4.7-.84 5.687-1.628A3.963 3.963 0 0 0 55 33.874V38a4 4 0 0 1-8 0zM51 44a6 6 0 0 0 1-.09v.676l-1 1-1-1v-.676a6 6 0 0 0 1 .09zm-11 3.819 5.6-1.12 1.469 3.672a.978.978 0 0 0 .227.331l-.005.005 1.636 1.636-.915 5.493a1 1 0 0 0 .279.871L50 60.414V62H40zM62 62H52v-1.586l1.707-1.707a1 1 0 0 0 .279-.871l-.915-5.493 1.636-1.636-.007-.007a.978.978 0 0 0 .227-.331L56.4 46.7l5.6 1.12zM20.489 11.86a1 1 0 0 0 .99.018l.521-.285V21a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-9.407l.521.285A1 1 0 0 0 44 11V7a1 1 0 0 0-.521-.878l-11-6a1 1 0 0 0-.958 0L28 2.043V1a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v4.316l-1.479.806A1 1 0 0 0 20 7v4a1 1 0 0 0 .489.86zM27 20v-6h2v6zm13 0h-9v-7a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v7h-1v-9.5l8-4.364 8 4.364zM24 2h2v1.134l-2 1.091zm-2 5.594 10-5.455 10 5.455v1.721l-9.521-5.193a1 1 0 0 0-.958 0L22 9.315z" />
                                            <path
                                                d="M32 17a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1zm2-3h3v2h-3zM47 11h10v2H47zM46.504 7.132l7-4 .992 1.737-7 4zM46.504 16.869l.993-1.737 7 4-.993 1.736zM7 11h10v2H7zM9.504 4.868l.993-1.737 7 4-.993 1.737zM9.504 19.131l7-4 .992 1.737-7 4zM40.7 31.7a.974.974 0 0 0 .006-1.408l-4-4-1.414 1.414L37.586 30H33v-6h-2v6h-4.586l2.293-2.293-1.414-1.414-4 4A.974.974 0 0 0 23.3 31.7l-.006.006 4 4 1.414-1.414L26.414 32h11.172l-2.293 2.293 1.414 1.414 4-4z" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $pending }}</h3>
                            <p class="text-muted fs-13 mb-0">Order Pending</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                    <path d="M160 64C142.3 64 128 78.3 128 96C128 113.7 142.3 128 160 128L160 139C160 181.4 176.9 222.1 206.9 252.1L274.8 320L206.9 387.9C176.9 417.9 160 458.6 160 501L160 512C142.3 512 128 526.3 128 544C128 561.7 142.3 576 160 576L480 576C497.7 576 512 561.7 512 544C512 526.3 497.7 512 480 512L480 501C480 458.6 463.1 417.9 433.1 387.9L365.2 320L433.1 252.1C463.1 222.1 480 181.4 480 139L480 128C497.7 128 512 113.7 512 96C512 78.3 497.7 64 480 64L160 64zM224 139L224 128L416 128L416 139C416 158 410.4 176.4 400 192L240 192C229.7 176.4 224 158 224 139zM240 448C243.5 442.7 247.6 437.7 252.1 433.1L320 365.2L387.9 433.1C392.5 437.7 396.5 442.7 400.1 448L240 448z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <a href="" class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $completed }}</h3>
                                <p class="text-muted fs-13 mb-0">Order Completed</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                        <path d="M439.4 96L448 96C483.3 96 512 124.7 512 160L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 160C128 124.7 156.7 96 192 96L200.6 96C211.6 76.9 232.3 64 256 64L384 64C407.7 64 428.4 76.9 439.4 96zM376 176C389.3 176 400 165.3 400 152C400 138.7 389.3 128 376 128L264 128C250.7 128 240 138.7 240 152C240 165.3 250.7 176 264 176L376 176zM256 320C256 302.3 241.7 288 224 288C206.3 288 192 302.3 192 320C192 337.7 206.3 352 224 352C241.7 352 256 337.7 256 320zM288 320C288 333.3 298.7 344 312 344L424 344C437.3 344 448 333.3 448 320C448 306.7 437.3 296 424 296L312 296C298.7 296 288 306.7 288 320zM288 448C288 461.3 298.7 472 312 472L424 472C437.3 472 448 461.3 448 448C448 434.7 437.3 424 424 424L312 424C298.7 424 288 434.7 288 448zM224 480C241.7 480 256 465.7 256 448C256 430.3 241.7 416 224 416C206.3 416 192 430.3 192 448C192 465.7 206.3 480 224 480z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <a href="" class="card-link">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="mb-2 fw-semibold">{{ $cancelled }}</h3>
                                <p class="text-muted fs-13 mb-0">Order Cancelled</p>
                            </div>
                            <div class="col col-auto top-icn dash">
                                <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                        <path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
