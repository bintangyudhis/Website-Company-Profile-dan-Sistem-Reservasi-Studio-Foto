@extends('layouts.app')

@section('content')
<div class="bg-primary text-white py-5 text-center">
    <h1 class="fw-bold">Pertanyaan Umum (FAQ)</h1>
    <p>Temukan jawaban untuk pertanyaan yang paling sering diajukan.</p>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="accordion shadow-sm" id="faqAccordion">
                @foreach($faqs as $faq)
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
