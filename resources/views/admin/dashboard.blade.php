@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#0">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->role === 'admin')
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Yeni Siparişler</h6>
                            <h3 class="text-bold mb-10">34567</h3>
                            <p class="text-sm text-success"><i class="lni lni-arrow-up"></i> +2.00%</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(auth()->user()->role === 'attendee')
            <div class="row">
                <div class="col-md-12">
                    <div class="icon-card mb-30">
                        <div class="icon green">
                            <i class="lni lni-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Katılımcı Paneli</h6>
                            <p>Hoş geldiniz! Kendi katılımcı panelinizi buradan görebilirsiniz.</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif(auth()->user()->role === 'organizer')
            <div class="row">
                <div class="col-md-12">
                    <div class="icon-card mb-30">
                        <div class="icon blue">
                            <i class="lni lni-briefcase"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Organizatör Paneli</h6>
                            <p>Buradan etkinliklerinizi ve katılımcılarınızı yönetebilirsiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>Geçerli bir rol bulunamadı.</p>
        @endif
    </div>
</section>
@endsection
