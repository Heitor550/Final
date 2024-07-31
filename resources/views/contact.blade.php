@extends("layouts.main")

@section("title", "Contate-nos!")

@section("content")
<div class="container mt-5">
    <h1 class="text-center mb-4">Entre em Contato</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Mensagem:</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="/" class="btn btn-outline-secondary">Voltar para a Home</a>
    </div>
</div>
@endsection

@section("styles")
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section("scripts")
<script src="{{ asset('js/script.js') }}"></script>
@endsection