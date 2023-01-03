@extends('layout.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kanban Board</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    {{-- <div class="breadcrumb-item"><a href="#">M-Pay</a></div> --}}
                    <div class="breadcrumb-item">Kanban Board</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kanban Board</h2>
                <p class="section-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </section>
    </div>
@endsection
